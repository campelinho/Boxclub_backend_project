<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\NieuwsController;
use App\Http\Controllers\ProfielController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\VraagController;
use App\Http\Controllers\GebruikerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Public homepage
Route::get('/', function () {
    return view('homepage');
})->name('homepage');

// Authentication routes
Auth::routes();

// Authenticated users
Route::middleware(['auth'])->group(function () {
    // Profiel
    Route::get('/profiel', [ProfielController::class, 'index'])->name('profiel.index');
    Route::post('/profiel', [ProfielController::class, 'update'])->name('profiel.update');

    // Nieuws CRUD
    Route::resource('nieuws', NieuwsController::class);

    // Public FAQ
    Route::get('/faq', [FaqController::class, 'indexPubliek'])->name('faq.publiek');

    // Vragen (todos usuários autenticados podem criar)
    Route::resource('vraag', VraagController::class)->except(['index', 'show']);
});

// Admin-only routes
Route::middleware(['auth', 'adminOnly'])->group(function () {
    // Promote/Demote gebruiker
Route::patch('gebruikers/{gebruiker}/promote', [GebruikerController::class, 'promote'])->name('gebruikers.promote');
Route::patch('gebruikers/{gebruiker}/demote', [GebruikerController::class, 'demote'])->name('gebruikers.demote');

    // Categorieën
    Route::resource('categorie', CategorieController::class);

    // Gebruikersbeheer
    Route::resource('gebruikers', GebruikerController::class);

    // Promoção/demissão de admins
    Route::post('/gebruikers/{gebruiker}/promoveer', [GebruikerController::class, 'promoveer'])->name('gebruikers.promoveer');
    Route::post('/gebruikers/{gebruiker}/demoveer', [GebruikerController::class, 'demoveer'])->name('gebruikers.demoveer');
});

// Legacy dashboard (opcional)
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
