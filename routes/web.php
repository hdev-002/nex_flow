<?php

use App\Http\Controllers\PluginsController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserManagement\UserController;
use Illuminate\Support\Facades\Route;
Route::get('/test', function () {
    return redirect()->route('dashboard');
});
Route::get('/applications', function(){
    return view('livewire.application-list');
})->name('applications.list');

Route::get('/', function () {
    return redirect()->route('login');
});
Route::get('change-language/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'mm', 'sm_mm'])) {
        session(['locale' => $locale]);
    }
    return redirect()->back();
})->name('change.language');









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

    Route::prefix('plugins')->name('plugins.')->group(function () {
        Route::get('/marketplace', [PluginsController::class, 'marketplace'])->name('marketplace');
        Route::get('/installed', [PluginsController::class, 'installed'])->name('installed');
    });

    // Business Settings Route
    Route::get('/business-settings', \App\Livewire\BusinessSettings::class)->name('business.settings');
    Route::get('/nevigation-settings', \App\Livewire\NavigationSettings::class)->name('navigation.customize');
    Route::get('/dashboard-customization', \App\Livewire\DashboardCustomize::class)->name('dashboard.customize');

    // Location Routes
    Route::get('/locations', \App\Livewire\Location\ListLocations::class)->name('locations.list');
    Route::get('/locations/view/{id}', \App\Livewire\Location\ViewLocation::class)->name('locations.view');
    Route::get('/locations/create', \App\Livewire\Location\CreateLocation::class)->name('locations.create');
    Route::get('/locations/edit/{id}', \App\Livewire\Location\UpdateLocation::class)->name('locations.update');

    Route::get('backup', \App\Livewire\DatabaseBackup::class)->name('backup');

});
