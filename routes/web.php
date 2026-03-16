<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuteurController;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\LivreController;
use App\Http\Controllers\EmpruntController;

Route::get('/', function () {
    return redirect()->route('livres.index');
});

Route::resource('auteurs',   AuteurController::class);
Route::resource('etudiants', EtudiantController::class);
Route::resource('livres',    LivreController::class);
Route::resource('emprunts',  EmpruntController::class);
