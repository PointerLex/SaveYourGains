<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Progress;

class ClientController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Recuperar los registros de progreso para el usuario actual
        $progresses = Progress::with('routine')
            ->where('user_id', $user->id)
            ->orderBy('day', 'desc')
            ->get()
            ->groupBy('day');

        // Verifica si hay registros de progreso
        $hasProgress = !$progresses->isEmpty();

        //dd($hasProgress);

        return view('client.clientDashboard', compact('progresses', 'hasProgress'));
        //return view('client.clientDashboard');
    }



    public function achievementIndex()
    {
        return view('client.achievement');
    }

    public function leaderboardIndex()
    {
        return view('client.leaderboard');
    }


    public function customizeRoutineIndex()
    {
        return view('client.customizeRoutine');
    }



}
