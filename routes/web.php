<?php

use App\Http\Controllers\HomepageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomepageController::class, 'index'])->name('currency_rates.index');

Route::get('/login', function () {
    return redirect(route('filament.admin.auth.login'));
})->name('login');
