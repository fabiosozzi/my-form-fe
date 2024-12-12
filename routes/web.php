<?php

use App\Http\Controllers\FormController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', [FormController::class, 'index'])->name('form.index');
Route::post('/', [FormController::class, 'store'])->name('form.store');
Route::get('/confirm', [FormController::class, 'confirm'])->name('form.confirm');
