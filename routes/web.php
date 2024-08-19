<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RoutineController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [HomeController::class, 'index']);
Route::get('/aboutus', [HomeController::class, 'aboutUsIndex'])->name('aboutus');
Route::get('/howitworks', [HomeController::class, 'howItWorksIndex'])->name('howitworks');
Route::get('/whysavemyprogress', [HomeController::class, 'whySaveProgresIndex'])->name('whysavemyprogress');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('login.store');
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [ClientController::class, 'index'])->name('clientDashboard');
    Route::get('/achievement', [ClientController::class, 'achievementIndex'])->name('achievement');
    Route::get('/customize-routine', [ClientController::class, 'customizeRoutineIndex'])->name('customize-routine');
    Route::get('/leaderboard', [ClientController::class, 'leaderboardIndex'])->name('leaderboard');
    Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');

    Route::get('/routines/create', [RoutineController::class, 'create'])->name('routines.create');
    Route::post('/routines', [RoutineController::class, 'store'])->name('routines.store');
    Route::get('/routines/{routine}/edit', [RoutineController::class, 'edit'])->name('routines.edit');
    Route::put('/routines/{routine}', [RoutineController::class, 'update'])->name('routines.update');
    Route::delete('/routines/{routine}', [RoutineController::class, 'destroy'])->name('routines.destroy');
});

