<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Routine;
use App\Models\Exercise;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class RoutineController extends Controller
{
    // Muestra la vista para crear una nueva rutina
    public function create()
    {
        return view('client.routine.create');
    }

    // Almacena la rutina y sus ejercicios
    public function store(Request $request)
    {
        $request->validate([
            'routine_name' => 'required|string|max:255',
            'exercise_name.*' => 'required|string|max:255',
            'exercise_mode.*' => 'required|string|max:255',
            'sets.*' => 'required|integer|min:1',
            'rest.*' => 'required|string|max:255',
            'reps.*.*' => 'nullable|integer|min:0',
            'weight.*.*' => 'nullable|integer|min:0',
        ]);

        DB::transaction(function () use ($request) {
            $routine = Routine::create([
                'name' => $request->input('routine_name'),
                'description' => $request->input('description', null),
                'user_id' => Auth::id(),
            ]);

            foreach ($request->exercise_name as $index => $name) {
                $exercise = Exercise::create([
                    'name' => $name,
                    'mode' => $request->exercise_mode[$index],
                    'set_amount' => $request->sets[$index],
                    'rest' => $request->rest[$index],
                    'routine_id' => $routine->id,
                ]);

                if (isset($request->reps[$index])) {
                    foreach ($request->reps[$index] as $seriesIndex => $reps) {
                        $exercise->sets()->create([
                            'rep_amount' => $reps ?? null,
                            'weight' => $request->weight[$index][$seriesIndex] ?? null,
                        ]);
                    }
                }
            }
        });

        return redirect()->route('routines.create')->with('success', 'Routine created successfully.');
    }

    // Muestra la vista para listar y editar las rutinas del usuario
    public function index()
    {
        $routines = Routine::where('user_id', Auth::id())->paginate(10);

        if ($routines->isEmpty()) {
            return view('client.routine.edit', compact('routines'))->with('message', 'Aún no tiene rutinas creadas, puede crear su rutina aquí.');
        }

        return view('client.routine.edit', compact('routines'));
    }


    // Función para listar las rutinas
    public function list()
    {
        $routines = Routine::where('user_id', Auth::id())->paginate(10);

        return view('client.routine.list', compact('routines'));
    }


    // Muestra la vista para editar una rutina existente
    public function edit(Routine $routine)
    {

        if ($routine->user_id != Auth::id()) {
            return redirect()->route('routines.index')->with('error', 'No tienes permiso para editar esta rutina.');
        }

        return view('client.routine.edit', compact('routine'));
    }



    public function update(Request $request, Routine $routine)
    {
        $request->validate([
            'routine_name' => 'required|string|max:255',
            'exercise_name.*' => 'required|string|max:255',
            'exercise_mode.*' => 'required|string|max:255',
            'sets.*' => 'required|integer|min:1',
            'rest.*' => 'required|string|max:255',
            'reps.*.*' => 'nullable|integer|min:0',
            'weight.*.*' => 'nullable|integer|min:0',
        ]);

        DB::transaction(function () use ($request, $routine) {
            // Actualizar la rutina
            $routine->update([
                'name' => $request->input('routine_name'),
                'description' => $request->input('description', null),
            ]);

            // Eliminar ejercicios antiguos
            $routine->exercises()->delete();

            // Crear los nuevos ejercicios y sets
            foreach ($request->exercise_name as $index => $name) {
                $exercise = Exercise::create([
                    'name' => $name,
                    'mode' => $request->exercise_mode[$index],
                    'set_amount' => $request->sets[$index],
                    'rest' => $request->rest[$index],
                    'routine_id' => $routine->id,
                ]);

                // Guardar sets para cada ejercicio si existen
                if (isset($request->reps[$index])) {
                    foreach ($request->reps[$index] as $seriesIndex => $reps) {
                        $exercise->sets()->create([
                            'rep_amount' => $reps ?? null,
                            'weight' => $request->weight[$index][$seriesIndex] ?? null,
                        ]);
                    }
                }
            }
        });

        return redirect()->route('routines.index')->with('success', 'Routine updated successfully.');
    }


    // Elimina una rutina existente
    public function destroy(Routine $routine)
    {
        if ($routine->user_id != Auth::id()) {
            return redirect()->route('routines.index')->with('error', 'No tienes permiso para eliminar esta rutina.');
        }

        $routine->delete();

        return redirect()->route('routines.index')->with('success', 'Routine deleted successfully.');
    }
}
