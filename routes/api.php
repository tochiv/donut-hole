<?php

use App\Http\Controllers\Api\DepartmentController;
use App\Http\Controllers\Api\EmployeeController;
use Illuminate\Support\Facades\Route;

Route::controller(DepartmentController::class)->group(function () {
    Route::get('/departments', 'index');
    Route::post('/departments', 'store');
    Route::put('/departments/{id}', 'update');
    Route::delete('/departments/{id}', 'destroy');
});

Route::controller(EmployeeController::class)->group(function () {
    Route::get('/employees', 'index');
    Route::post('/employees', 'store');
    Route::put('/employees/{id}', 'update');
    Route::delete('/employees/{id}', 'destroy');
});
