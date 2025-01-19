<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TeamController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if (Auth::user()) {
        return redirect()->route('tasks.index', ['mytasks'=>true]);
    } else {
        return redirect('/login');
    }
});

Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::post('/authenticate', 'authenticate');

    Route::get('/forgot-password', 'forgot')->middleware('guest')->name('password.request');
    Route::post('/forgot-password', 'sendForgotMail')->middleware('guest')->name('password.email');

    Route::get('/reset-password/{token}', 'reset')->middleware('guest')->name('password.reset');
    Route::post('/reset-password', 'resetPassword')->middleware('guest')->name('password.update');

    Route::get('/register', 'register');
    Route::post('/store', 'store');

    Route::post('logout', 'logout')->middleware('auth');
});

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('teams', TeamController::class);
    Route::resource('projects', ProjectController::class);
    Route::resource('tasks', TaskController::class);

    Route::post('/tasks/update-status/{task}', [TaskController::class, 'updateStatus'])->name('tasks.updateStatus');

    Route::get('/performance', function(){
        return view('pages.company.performance.performance');
    })->name('performance');
});
