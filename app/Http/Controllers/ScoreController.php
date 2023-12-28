<?php

namespace App\Http\Controllers;
use App\Models\Score;
use Illuminate\Http\Request;
use App\Exports\ScoresExport;
use App\Imports\ScoresImport;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use MathPHP\Probability\Distribution\Continuous;

class ScoreController extends Controller
{
    function normsdist($x)
{
    $distribution = new Continuous\Normal(0, 1); 
    return $distribution->cdf($x); 
}

public function liliefors()
{
    $scores = Score::all(); # sesuaikan dengan nama model
    $scoresAverage = $scores->avg('score'); # sesuaikan dengan nama colom nilai
    $scoresSTD = DB::table('scores') # sesuaikan dengan table dan colom nilai
        ->selectRaw('SQRT(SUM(POWER(score - ' . $scoresAverage . ', 2)) / (COUNT(score) - 1)) AS result')->first();

    $sortedScores = $scores->pluck('score')->sort()->toArray();

    $totalData = count($sortedScores);

    $empiricalCumulativeProbability = [];

    $cumulativeCount = 0;
    foreach ($sortedScores as $value) {
        $cumulativeCount++;
        $empiricalCumulativeProbability[$value] = $cumulativeCount / $totalData;
    }

    $zScores = [];
    foreach ($scores as $score) {
        $scoreValue = $score->score;
        $zScore = ($scoreValue - $scoresAverage) / $scoresSTD->result;
        $normsdist = $this->normsdist($zScore);
        $zScores[$score->id] = [
            'scoreValue' => $scoreValue,
            'zScore' => number_format($zScore, 5),
            'normsdist' => number_format($normsdist, 5),
            'empiricalCumulativeProbability' => number_format($empiricalCumulativeProbability[$scoreValue], 5),
            'fx' => abs($normsdist - $empiricalCumulativeProbability[$scoreValue]),
        ];
    }

    return view('dashboard.liliefors', compact('scores', 'zScores'));
}


public function export()
{
    return Excel::download(new ScoresExport, 'scores.xlsx');
}


public function import()
{
    Excel::import(new ScoresImport, request()->file('file'));

    return redirect('/')->with('success', 'Success Import Scores');
}
}
