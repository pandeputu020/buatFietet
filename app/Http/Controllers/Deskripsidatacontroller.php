<?php

namespace App\Http\Controllers;
use App\Models\Datatunggal;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class Deskripsidatacontroller extends Controller
{
    public function index()
{
    $skor = Datatunggal::all();
    $count = $skor->count();
    
    $mean = $skor->avg('skor');

    $nilaiSkor = $skor->map(function ($item) use ($mean) {
        return pow($item->skor - $mean, 2);
    });

    $sigma = $nilaiSkor->sum();
    $standardeviasi = sqrt($sigma / $count);

    $maxskor = Datatunggal::max('skor');
    $minskor = Datatunggal::min('skor');
    $averageskor = $mean;
    $jumlahdataskor = $count;

    return view('tabeldeskripsidatas.index', compact('maxskor', 'minskor', 'averageskor', 'jumlahdataskor', 'standardeviasi'));
}

}