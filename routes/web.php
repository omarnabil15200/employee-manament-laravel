<?php

use App\Http\Controllers\ManagerController;
use App\Http\Controllers\EmployeeController;

use App\Http\Controllers\Auth\LoginController;

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/login', function() {
    return view('auth.login');
})->name('login');

Route::post('/login', [ManagerController::class, 'login']);
//Route::post('/logout', [ManagerController::class, 'logout'])->middleware('auth');

Route::get('/register', function() {
    return view('auth.register');
})->name('register');

Route::post('/register', [ManagerController::class, 'register']);

Route::resource('employees', EmployeeController::class);
