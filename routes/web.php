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

        $navigationItems = Navigation::whereNull('parent_id')
            ->where('group', 'dashboard')
            ->with('children')
            ->orderBy('order')
            ->get();



        return view('dashboard', compact('navigationItems'));
    })->name('dashboard');

    Route::prefix('student')->name('student.')->group(function () {
        Route::get('/', [StudentController::class, 'index'])->name('index');
    });
});
