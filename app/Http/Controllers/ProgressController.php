<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Progress;

class ProgressController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // Obtener las rutinas del usuario
        $routines = $user->routines;

        return view('client.progress.save', compact('routines'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'day' => 'required|date',
            'time' => 'required',
            'routine_id' => 'required|exists:routines,id',
            'reps.*.*' => 'nullable|integer|min:0',
            'weight.*.*' => 'nullable|numeric|min:0',
        ]);

        $user = Auth::user();

        $progress = Progress::create([
            'user_id' => $user->id,
            'routine_id' => $request->routine_id,
            'day' => $request->day,
            'time' => $request->time,
            'notes' => $request->notes,
        ]);

        // Aquí podrías manejar el almacenamiento de las repeticiones y peso por ejercicio si lo deseas.

        return redirect()->route('clientDashboard')->with('success', 'Progreso registrado correctamente.');
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
