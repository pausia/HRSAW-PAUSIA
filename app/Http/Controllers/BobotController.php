<?php

namespace App\Http\Controllers;

use App\Models\Bobot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;


class BobotController extends Controller
{
    public function tampilBobot()
    {
        $bobot_kriteria = Bobot::where('user_id', Auth::id())->paginate(10);
        if ($bobot_kriteria->isEmpty()) {
            return view('user.emptybobot'); // Sesuaikan dengan nama view halaman empty
        }
        return view('user.bobot', compact('bobot_kriteria'));
    }

    public function storebobot(Request $request)
    {
        $request->validate([
            'criteria' => 'required|string|max:255',
            'weight' => 'required|numeric',
            'attribute' => 'required|in:benefit,cost',
        ]);
    
        Bobot::create([
            'criteria' => $request->input('criteria'),
            'weight' => $request->input('weight'),
            'attribute' => $request->input('attribute'),
            'user_id' => Auth::id(),
        ]);

        Alert::success('Berhasil Menambahkan Alternatif', 'Kita sudah menambahkan alternatif baru di tabel');
    
        return redirect()->route('user.bobot')->with('success', 'Data has been added successfully.');
    }
    

     public function updateBobot($id)
     {
         $bobot_kriteria =  Bobot::findOrFail($id);
         return view('user.editbobot',compact('bobot_kriteria'));
     }

    public function editBobot(Request $request, $id)
    {
        $bobot_kriteria = Bobot::find($id);

        $request->validate([
            'criteria' => 'required|string|max:255',
            'weight' => 'required|numeric',
            'attribute' => 'required|in:benefit,cost',
        ]);

        $bobot_kriteria->criteria = $request->input('criteria');
        $bobot_kriteria->weight = $request->input('weight');
        $bobot_kriteria->attribute = $request->input('attribute');

        $bobot_kriteria->save();
    
        Alert::success('Berhasil Mengupdate Alternatif', 'Kita sudah mengupdate alternatif dari table');
        return redirect()->route('user.bobot')->with('success', 'Alternatif updated successfully');
    }
    

    public function deleteBobot($id)
    {
        Bobot::findOrFail($id)->delete();
        Alert::success('Berhasil Menghapus Bobot Kriteria', 'Kita sudah menghapus bobot kriteria dari table');
        return redirect()->back();
    }
}
