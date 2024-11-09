<?php

use App\Http\Controllers\StudentController;
use App\Models\Navigation;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        $section = 'dashboard';

        return view('dashboard', compact('section'));
    })->name('dashboard');

    Route::prefix('student')->name('student.')->group(function () {
        Route::get('/', [StudentController::class, 'index'])->name('index');
    });
});
