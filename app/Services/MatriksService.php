<?php


namespace App\Services;

use App\Models\Matriks;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MatriksService
{
    public function storeMatriks(array $data)
    {
        try {
            // Validasi input
            $this->validateData($data);

            // Simpan data ke dalam tabel saw_evaluations
            DB::table('saw_evaluations')->insert([
                'id_alternative' => $data['id_alternative'],
                'id_criteria' => $data['id_criteria'],
                'value' => $data['value'],
                'user_id' => Auth::id(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        } catch (\Exception $e) {
            // Tangkap exception untuk duplikasi key
            if ($e->getCode() == 23000) {
                // ... (kode penanganan duplikasi key)
            }

            // Re-throw exception jika bukan karena duplikasi
            throw $e;
        }
    }

    protected function validateData(array $data)
    {
        // Validasi input
        validator($data, [
            'id_alternative' => 'required',
            'id_criteria' => 'required',
            'value' => 'required|numeric',
        ])->validate();
    }
}
