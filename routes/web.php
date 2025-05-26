<?php

use App\Http\Controllers\ProfielController;

Route::middleware('auth')->group(function () {
    Route::get('/profiel/bewerken', [ProfielController::class, 'bewerken'])->name('profiel.bewerken');
    Route::post('/profiel/bewerken', [ProfielController::class, 'update'])->name('profiel.update');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
