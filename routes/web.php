<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfielController;
use App\Http\Controllers\NieuwsController;
use Illuminate\Support\Facades\Auth;

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profiel/bewerken', [ProfielController::class, 'bewerken'])->name('profiel.bewerken');
    Route::post('/profiel/bewerken', [ProfielController::class, 'update'])->name('profiel.update');

    Route::resource('nieuws', NieuwsController::class);
});
