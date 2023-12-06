<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SawAlternativeResult;
use App\Models\Matriks;
use App\Models\Bobot;
use App\Models\Alternatif;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ResultController extends Controller
{
    public function tampilResult()
    {
        // Calculate ranking and save to saw_alternatives_results
        $this->calculateAndSaveRanking();

        // Retrieve data from the saw_alternatives_results table
        $results = SawAlternativeResult::where('user_id', Auth::id())->get();

        // Assuming you have a blade view file at resources/views/user/result.blade.php
        return view('user.result', compact('results'));
    }

    private function calculateAndSaveRanking()
    {
        $user_id = Auth::id();

        // Retrieve criteria weights from the database
        $criteriaWeights = Bobot::where('user_id', $user_id)->pluck('weight', 'criteria');

        // Retrieve data from the matriks table
        $matriks = Matriks::where('user_id', $user_id)->get();

        $alternatives = $matriks->groupBy('id_alternative');

        // Calculate total value for each alternative
        foreach ($alternatives as $alternativeId => $alternativeEvaluations) {
            $totalValue = 0;

            foreach ($alternativeEvaluations as $evaluation) {
                $criteriaId = $evaluation->id_criteria;

            // Periksa apakah kunci ada di dalam array
            if (isset($criteriaWeights[$criteriaId])) {
                $normalizedValue = $evaluation->attribute == 'benefit' ?
                    $evaluation->value / $this->getMaxValue($criteriaId) :
                    $this->getMinValue($criteriaId) / $evaluation->value;

                $totalValue += $normalizedValue * $criteriaWeights[$criteriaId];
            } else {
                // Handle jika kunci tidak ditemukan
                // Misalnya, dapat menampilkan pesan kesalahan atau mengabaikan nilai tersebut
                // atau menetapkan nilai default
                // $totalValue += 0; // atau nilai default lainnya
            }
            }

            // Save the result to the saw_alternatives_results table
            SawAlternativeResult::updateOrCreate(
                [
                    'user_id' => $user_id,
                    'id_alternative' => $alternativeId,
                ],
                [
                    'total_value' => $totalValue,
                ]
            );
        }
    }

    private function getMaxValue($criteriaId)
    {
        // Implement logic to retrieve the maximum value for a specific criteria
        // You may need to query your database or use predefined values
        return 100; // Replace with actual logic
    }

    private function getMinValue($criteriaId)
    {
        // Implement logic to retrieve the minimum value for a specific criteria
        // You may need to query your database or use predefined values
        return 0; // Replace with actual logic
    }
}
