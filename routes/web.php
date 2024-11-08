<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [\App\Http\Controllers\AuthController::class, 'index'])->name('auth.login');
Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login'])->name('login');
Route::post('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
Route::get('/register', [\App\Http\Controllers\AuthController::class, 'register'])->name('auth.register');


Route::middleware('auth')->group(function () {
    Route::get('/home', [\App\Http\Controllers\Home::class, 'index'])->name('home.dashboard');
    Route::resource('user', \App\Http\Controllers\UserController::class);
    Route::resource('companies', \App\Http\Controllers\CompanyController::class);
    Route::resource('positions', \App\Http\Controllers\PositionController::class);
    Route::resource('invitations', \App\Http\Controllers\InvitationController::class);
    Route::resource('tasks', \App\Http\Controllers\TaskController::class);
    Route::post('/tasks/{task}/assign', [\App\Http\Controllers\TaskController::class, 'assignTask'])->name('tasks.assign');
});
