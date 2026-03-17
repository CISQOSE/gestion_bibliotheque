<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuteurController;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\LivreController;
use App\Http\Controllers\EmpruntController;
use App\Http\Controllers\AuthController;

// routes/web.php
Route::get('/', function () {
    return redirect()->route('livres.index');
});

// Routes publiques
Route::get('/login',    [AuthController::class, 'showLogin'])->name('login');
Route::post('/login',   [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register',[AuthController::class, 'register']);

// Routes protégées — uniquement si connecté
Route::middleware('auth')->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::resource('auteurs',   AuteurController::class);
    Route::resource('etudiants', EtudiantController::class);
    Route::resource('livres',    LivreController::class);
    Route::resource('emprunts',  EmpruntController::class);
});
