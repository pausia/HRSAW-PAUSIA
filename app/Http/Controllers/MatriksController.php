<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Bobot;
use App\Models\Matriks;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;
use App\Services\MatriksService;

class MatriksController extends Controller
{
    protected $matriksService;

    public function __construct(MatriksService $matriksService)
    {
        $this->matriksService = $matriksService;
    }

    public function tampilMatriks()
    {
        $bobot_kriteria = Bobot::all();
        $user_id = Auth::id();
        $bobot_kriteria = Bobot::where('user_id', $user_id)->get();
        $alternative = Alternatif::where('user_id', $user_id)->get();
        $matriks = [];

        if ($bobot_kriteria->isEmpty()) {
            return view('user.emptymatriks', compact('matriks', 'bobot_kriteria', 'alternative')); // Sesuaikan dengan nama view halaman empty
        }

        // Menambahkan kriteria yang belum memiliki nilai
        foreach ($bobot_kriteria as $criteria) {
            $kriteriaKey = 'c' . $criteria->id;

            // Jika kriteria belum ada dalam matriks, tambahkan dengan nilai null
            if (!empty($matriks) && !array_key_exists($kriteriaKey, $matriks[0])) {
                foreach ($matriks as &$row) {
                    $row[$kriteriaKey] = null;
                }
            }
        }

        if ($alternative->isEmpty()) {
            return view('user.emptymatriks',compact('matriks', 'bobot_kriteria', 'alternative')); // Sesuaikan dengan nama view halaman empty
        }

        foreach ($alternative as $alternatif) {
            $row = [
                'alternative' => $alternatif->name,
            ];

            foreach ($bobot_kriteria as $criteria) {
                $evaluation = DB::table('saw_evaluations')
                    ->where('id_alternative', $alternatif->id)
                    ->where('id_criteria', $criteria->id)
                    ->first();

                // Menambahkan nilai kriteria ke dalam matriks
                $row['c' . $criteria->id] = $evaluation ? $evaluation->value : 0;
            }

            // Menambahkan baris ke dalam matriks
            $matriks[] = $row;
        }

        return view('user.matriks', compact('matriks', 'bobot_kriteria', 'alternative'));
    }

    public function storeMatriks(Request $request)
    {
        try {
            $this->matriksService->storeMatriks($request->all());

            Alert::success('Berhasil Menambahkan Alternatif', 'Kita sudah menambahkan alternatif baru di table');

            return redirect()->route('user.matriks')->with('success', 'Data matriks berhasil ditambahkan.');
        } catch (QueryException $e) {
            // Tangkap exception untuk duplikasi key
            if ($e->getCode() == 23000) {
                Alert::warning('Duplikasi Data', 'Data dengan kombinasi tersebut sudah ada.');

                return redirect()->route('user.matriks');
            }

            // Re-throw exception jika bukan karena duplikasi
            throw $e;
        }
    }

    public function updateMatriks($id)
    {
        $matriks =  Matriks::findOrFail($id);
        return view('user.editmatriks',compact('matriks'));
    }
    
    
}
