<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        return view('client.clientDashboard');
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
