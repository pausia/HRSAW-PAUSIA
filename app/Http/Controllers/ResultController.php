<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SawAlternativeResult;
use App\Models\Matriks;
use App\Models\Bobot;
use App\Models\Alternatif;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;

class ResultController extends Controller
{
    public function tampilResult()
    {
        $this->calculateAndSaveRanking();
        $results = SawAlternativeResult::with('alternative')
        ->where('user_id', Auth::id())
        ->orderBy('ranking', 'asc')
        ->get();
        return view('user.result', compact('results'));
    }

    private function calculateAndSaveRanking()
{
    $user_id = Auth::id();

    // Hapus hasil perhitungan sebelumnya
    SawAlternativeResult::where('user_id', $user_id)->delete();

    // Ambil semua bobot kriteria
    $bobot_kriteria = Bobot::where('user_id', $user_id)->get();

    // Ambil semua alternatif
    $alternatives = Alternatif::where('user_id', $user_id)->get();

    // Lakukan perhitungan total nilai untuk setiap alternatif
    foreach ($alternatives as $alternative) {
        $total_value = 0.0;

        foreach ($bobot_kriteria as $criteria) {
            $evaluation = Matriks::where('user_id', $user_id)
                ->where('id_alternative', $alternative->id)
                ->where('id_criteria', $criteria->id)
                ->first();

            // Hitung total nilai berdasarkan bobot, nilai kriteria, dan atribut "benefit" atau "cost"
            $weighted_value = $criteria->weight * $evaluation->value;

            if ($criteria->attribute == 'cost') {
                // Jika atribut adalah "cost", kurangkan nilai dari total
                $total_value -= $weighted_value;
            } else {
                // Jika atribut adalah "benefit" atau tidak ditentukan, tambahkan nilai ke total
                $total_value += $weighted_value;
            }
        }

        // Simpan hasil perhitungan total nilai ke dalam tabel saw_alternatives_results
        SawAlternativeResult::create([
            'user_id' => $user_id,
            'id_alternative' => $alternative->id,
            'total_value' =>  number_format($total_value / 100, 2),
        ]);
    }

    // Hitung peringkat
    DB::update("
        UPDATE saw_alternatives_results r
        JOIN (
            SELECT id, RANK() OVER (ORDER BY total_value DESC) as ranking
            FROM saw_alternatives_results
            WHERE user_id = $user_id
        ) ranks ON r.id = ranks.id
        SET r.ranking = ranks.ranking
    ");
}

}
