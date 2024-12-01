<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/users', function (Request $request) {
    $request->user()->tokenCan('student:read');
    return $request->user();
})->middleware('auth:sanctum');
