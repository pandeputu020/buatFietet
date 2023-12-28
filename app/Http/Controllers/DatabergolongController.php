<?php

namespace App\Http\Controllers;
use App\Models\Datatunggal;
use Illuminate\Http\Request;

class DatabergolongController extends Controller
{
    public function index()
    {
        $scores = Datatunggal::all();
        
        // Mengambil nilai minimum dan maksimum dari skor
        $minScore = $scores->min('skor');
        $maxScore = $scores->max('skor');
    
        // Menentukan jumlah kelas interval (bisa disesuaikan)
        $jumlahKelas = 5;
        
        // Menghitung lebar interval
        $intervalWidth = ceil(($maxScore - $minScore) / $jumlahKelas);
    
        // Mengelompokkan data skor ke dalam kelas interval
        $scoreGroups = [];
        for ($i = 0; $i < $jumlahKelas; $i++) {
            $lowerBound = $minScore + ($i * $intervalWidth);
            $upperBound = $lowerBound + $intervalWidth - 1;
            $count = $scores->whereBetween('skor', [$lowerBound, $upperBound])->count();
    
            // Menyimpan data kelas interval, nilai tengah, dan frekuensi
            $scoreGroups[] = [
                'kelas_interval' => "$lowerBound - $upperBound",
                'nilai_tengah' => ($lowerBound + $upperBound) / 2,
                'frekuensi' => $count,
            ];
        }
        
        return view('databergolong.databergolong', compact('scoreGroups'));
    }
}
