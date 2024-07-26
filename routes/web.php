<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\LogoutController;

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

Route::get('/dashboard', [ClientController::class, 'index'])->name('clientDashboard');
Route::get('/achievement', [ClientController::class, 'achievementIndex'])->name('achievement');
Route::get('/customRoutine', [ClientController::class, 'customizeRoutineIndex'])->name('customizeRoutine');
Route::get('/leaderboard', [ClientController::class, 'leaderboardIndex'])->name('leaderboard');


Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');


