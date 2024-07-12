<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kriteria;
use App\Models\Restorant;
use Illuminate\Support\Facades\Log; // Import Log

class TopsisController extends Controller
{
    public function index()
    {
        $kriterias = Kriteria::all();
        $restorants = Restorant::all();
        return view('topsis.index', compact('kriterias', 'restorants'));
    }

    public function calculate(Request $request)
    {
        $kriterias = Kriteria::all();
        $restorants = Restorant::all();
        $data = $request->input('data');
        
        // Debugging: Tampilkan data yang diterima dari request
        Log::info('Data from request:', $data);
        
        // Normalisasi matriks
        $normalized = [];
        foreach ($kriterias as $kriteria) {
            $sum = 0;
            foreach ($restorants as $restorant) {
                $sum += pow($data[$kriteria->id][$restorant->id], 2);
            }
            $sqrtSum = sqrt($sum);
            foreach ($restorants as $restorant) {
                $normalized[$kriteria->id][$restorant->id] = $data[$kriteria->id][$restorant->id] / $sqrtSum;
            }
        }
        
        // Debugging: Tampilkan hasil normalisasi
        Log::info('Normalized matrix:', $normalized);
        
        // Hitung weighted normalized decision matrix
        $weighted = [];
        foreach ($kriterias as $kriteria) {
            foreach ($restorants as $restorant) {
                $weighted[$kriteria->id][$restorant->id] = $normalized[$kriteria->id][$restorant->id] * $kriteria->bobot;
            }
        }
        
        // Debugging: Tampilkan matriks keputusan yang dinormalisasi dan dibobotkan
        Log::info('Weighted matrix:', $weighted);
        
        // Tentukan solusi ideal positif dan negatif
        $idealPositive = [];
        $idealNegative = [];
        foreach ($kriterias as $kriteria) {
            if ($kriteria->type == 'benefit') {
                $idealPositive[$kriteria->id] = max(array_column($weighted[$kriteria->id], $restorant->id));
                $idealNegative[$kriteria->id] = min(array_column($weighted[$kriteria->id], $restorant->id));
            } else {
                $idealPositive[$kriteria->id] = min(array_column($weighted[$kriteria->id], $restorant->id));
                $idealNegative[$kriteria->id] = max(array_column($weighted[$kriteria->id], $restorant->id));
            }
        }
        
        // Debugging: Tampilkan solusi ideal positif dan negatif
        Log::info('Ideal positive:', $idealPositive);
        Log::info('Ideal negative:', $idealNegative);
        
        // Hitung jarak ke solusi ideal positif dan negatif
        $positiveDistances = [];
        $negativeDistances = [];
        foreach ($restorants as $restorant) {
            $positiveSum = 0;
            $negativeSum = 0;
            foreach ($kriterias as $kriteria) {
                $positiveSum += pow($weighted[$kriteria->id][$restorant->id] - $idealPositive[$kriteria->id], 2);
                $negativeSum += pow($weighted[$kriteria->id][$restorant->id] - $idealNegative[$kriteria->id], 2);
            }
            $positiveDistances[$restorant->id] = sqrt($positiveSum);
            $negativeDistances[$restorant->id] = sqrt($negativeSum);
        }
        
        // Debugging: Tampilkan jarak ke solusi ideal positif dan negatif
        Log::info('Positive distances:', $positiveDistances);
        Log::info('Negative distances:', $negativeDistances);
        
        // Hitung skor preferensi
        $scores = [];
        foreach ($restorants as $restorant) {
            $scores[$restorant->id] = $negativeDistances[$restorant->id] / ($negativeDistances[$restorant->id] + $positiveDistances[$restorant->id]);
        }
        
        // Debugging: Tampilkan skor preferensi
        Log::info('Scores:', $scores);
        
        // Urutkan alternatif berdasarkan skor preferensi
        arsort($scores);
        
        // Debugging: Tampilkan hasil skor setelah diurutkan
        Log::info('Sorted scores:', $scores);
        
        return view('topsis.result', compact('scores', 'restorants'));
    }
}
