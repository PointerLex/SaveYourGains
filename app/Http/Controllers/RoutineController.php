<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Routine;
use App\Models\Exercise;
use Illuminate\Support\Facades\DB;

class RoutineController extends Controller
{


    // Muestra la vista para crear una nueva rutina
    public function create()
    {
        return view('client.routine.create'); // Asegúrate de que esta vista existe
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
            'reps.*.*' => 'required|integer|min:1',
            'weight.*.*' => 'required|integer|min:0',
        ]);


        DB::transaction(function () use ($request) {
            // Crear la rutina
            $routine = Routine::create([
                'name' => $request->input('routine_name'),
                'description' => $request->input('description', null), // Opcional
            ]);

            // Crear los ejercicios
            foreach ($request->exercise_name as $index => $name) {
                $exercise = Exercise::create([
                    'name' => $name,
                    'mode' => $request->exercise_mode[$index],
                    'set_amount' => $request->sets[$index],
                    'rest' => $request->rest[$index],
                    'routine_id' => $routine->id,
                ]);

                if (isset($request->reps[$index]) && is_array($request->reps[$index])) {
                    foreach ($request->reps[$index] as $seriesIndex => $reps) {
                        if (isset($request->weight[$index][$seriesIndex])) {
                            $exercise->series()->create([
                                'reps' => $reps,
                                'weight' => $request->weight[$index][$seriesIndex],
                            ]);
                        } else {
                            $exercise->series()->create([
                                'reps' => null,
                                'weight' => null,
                            ]);
                        }
                    }
                }
            }
        });


        return redirect()->route('routines.create')->with('success', 'Routine created successfully.');
    }

    // Muestra la vista para editar una rutina existente
    public function edit(Routine $routine)
    {
        return view('client.routine.edit', compact('routine'));
    }

    // Actualiza una rutina existente
    public function update(Request $request, Routine $routine)
    {
        $request->validate([
            'routine_name' => 'required|string|max:255',
            'exercise_name.*' => 'required|string|max:255',
            'exercise_mode.*' => 'required|string|max:255',
            'sets.*' => 'required|integer|min:1',
            'rest.*' => 'required|string|max:255',
            'reps.*.*' => 'required|integer|min:1',
            'weight.*.*' => 'required|integer|min:0',
        ]);

        DB::transaction(function () use ($request, $routine) {
            // Actualizar la rutina
            $routine->update([
                'name' => $request->input('routine_name'),
                'description' => $request->input('description', null),
            ]);

            // Eliminar ejercicios antiguos
            $routine->exercises()->delete();

            // Crear los nuevos ejercicios
            foreach ($request->exercise_name as $index => $name) {
                $exercise = Exercise::create([
                    'name' => $name,
                    'mode' => $request->exercise_mode[$index],
                    'set_amount' => $request->sets[$index],
                    'rest' => $request->rest[$index],
                    'routine_id' => $routine->id,
                ]);

                // Guardar series para cada ejercicio
                foreach ($request->reps[$index] as $seriesIndex => $reps) {
                    $exercise->series()->create([
                        'reps' => $reps,
                        'weight' => $request->weight[$index][$seriesIndex],
                    ]);
                }
            }
        });

        return redirect()->route('routines.index')->with('success', 'Routine updated successfully.');
    }

    // Elimina una rutina existente
    public function destroy(Routine $routine)
    {
        $routine->delete();

        return redirect()->route('routines.index')->with('success', 'Routine deleted successfully.');
    }

    // Muestra una lista de rutinas (si es necesario)
    public function index()
    {
        $routines = Routine::all();
        return view('routines.index', compact('routines'));
    }
}
