<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AlternatifController extends Controller
{
    public function tampilAlternatif()
    {
        $alternatives = Alternatif::where('user_id', Auth::id())->paginate(10);
        if ($alternatives->isEmpty()) {
            return view('user.emptyalternatif'); // Sesuaikan dengan nama view halaman empty
        }
        return view('user.alternatif', compact('alternatives'));
    }    

    public function storeAlternatif(Request $request)
    {
        // Validasi data yang masuk
        $request->validate([
            'name' => 'required|string|max:255',
            // Tambahkan validasi sesuai kebutuhan Anda
        ]);

        // Simpan data ke dalam tabel
        Alternatif::create([
            'name' => $request->input('name'),
            'user_id' => Auth::id(), 
            // Tambahkan kolom lain sesuai kebutuhan
        ]);

        Alert::success('Berhasil Menambahkan Alternatif', 'Kita sudah menambahkan alternatif baru di table');
        // Alert::warning('Gagai Menambahkan Alternatif', 'Kita gagai menambahkan alternatif baru di table');
        // Alert::info('Gagai Menambahkan Alternatif', 'Kita gagai menambahkan alternatif baru di table');

        return redirect()->route('user.alternatif')->with('success', 'Data has been added successfully.');
    }

    public function updateAlternatif($id)
    {
        $alternatif_name =  Alternatif::findOrFail($id);
        return view('user.editalternatif',compact('alternatif_name'));
    }


    public function editAlternatif(Request $request, $id)
    {
        $alternatif = Alternatif::find($id);
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            // Add more validation rules as needed
        ]);
    
        // Update the entity with the new data
        $alternatif->name = $request->input('name');
        // Update other fields as needed
    
        // Save the changes
        $alternatif->save();
    
        Alert::success('Berhasil Mengupdate Alternatif', 'Kita sudah mengupdate alternatif dari table');
        return redirect()->route('user.alternatif')->with('success', 'Alternatif updated successfully');
    }
    
    public function deleteAlternatif($id)
    {
        Alternatif::findOrFail($id)->delete();

        Alert::success('Berhasil Menghapus Alternatif', 'Kita sudah menghapus alternatif dari table');
        return redirect()->back();
    }


}
