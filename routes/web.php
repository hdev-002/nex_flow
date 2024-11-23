<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserManagement\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {

        return view('dashboard');
    })->name('dashboard');

    Route::prefix('users')->name('users.')->group(function () {
        Route::get('/dashboard', [UserController::class, 'index'])->name('dashboard');
        Route::get('/list', [UserController::class, 'index'])->name('list');
        Route::get('/create', [UserController::class, 'create'])->name('create');
        Route::get('/{id}/edit', [UserController::class, 'edit'])->name('edit');
    });

    Route::prefix('student')->name('student.')->group(function () {
        Route::get('/', [StudentController::class, 'index'])->name('index');
    });

    Route::get('/application-manager', function (){
        return view('application-manager',['section' => 'application-manager']);
    })->name('application-manager')->middleware(['password.confirm']);
});
