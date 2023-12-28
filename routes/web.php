<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ScoreController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::resource('/daftarusers', \App\Http\Controllers\DaftaruserController::class);

Route::resource('/datatunggals', \App\Http\Controllers\DatatunggalControler::class);

Route::resource('/datadistribusifs', \App\Http\Controllers\DatadistribusifController::class);

Route::resource('/tabeldeskripsidatas', \App\Http\Controllers\Deskripsidatacontroller::class);

Route::resource('/databergolong', \App\Http\Controllers\DatabergolongController::class);


Route::get('/liliefors', [ScoreController::class, 'liliefors'])->name('liliefors'); 

Route::get('export/', [ScoreController::class, 'export']); #disesuaikan


Route::get('import/', function () {
    return view('dashboard.import');
   });
   
   Route::post('import/', [ScoreController::class, 'import'])->name('import');