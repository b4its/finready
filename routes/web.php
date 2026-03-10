<?php

use App\Http\Controllers\Learning\LearningController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('learning')->group(function () {
    Route::controller(LearningController::class)->group(function () {
        Route::get('/', 'index')->name('learning.index');      
    });
});

