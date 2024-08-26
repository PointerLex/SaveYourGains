<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Progress;

class ProgressController extends Controller
{
    public function index()
    {
        return view ('client.progress.save');
    }

    public function show($day)
    {
        $user = Auth::user();
        $progresses = Progress::with('routine')
            ->where('user_id', $user->id)
            ->where('day', $day)
            ->get();

        return view('client.progressDetails', compact('progresses'));
    }
}
