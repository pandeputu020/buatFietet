<?php

namespace App\Http\Controllers;
use App\Models\Datasitribusif;
use App\Models\Datatunggal;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class DatadistribusifController extends Controller
{
    public function index():view
    {
        $frekuensi =Datatunggal::selectRaw('skor, count(*) as frekuensi')
        ->groupBy('skor')
        ->paginate(10);
        return view('datadistribusifs.index', compact('frekuensi'));
    }
}
