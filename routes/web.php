<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DebitController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Authentification Laravel (login, register, etc.)
Auth::routes();

// Page d'accueil après connexion
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Routes protégées pour utilisateurs connectés
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
    Route::post('/generate-debit', [AuthController::class, 'generateDebit'])->name('debit.generate');
});

Route::post('/debit/generate', [DebitController::class, 'generate'])->name('debit.generate');

Route::get('/debit', [DebitController::class, 'index'])->middleware('auth')->name('debit.index');

