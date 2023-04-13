<?php

use App\Http\Controllers\EcuController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/ecus', [EcuController::class, 'ecus'])->name('ecus');
Route::get('/etudiants', [EcuController::class, 'etudiants'])->name('etudiants');
Route::post('/etudiant/details', [EcuController::class, 'details'])->name('details');
Route::get('/downloadView/{id}', [EcuController::class, 'downloadView'])->name('downloadView');
