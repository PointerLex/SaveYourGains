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
        return view('client.routine.create');
    }

    // Almacena la rutina y sus ejercicios
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

                // Guardar sets para cada ejercicio si existen
                if (isset($request->reps[$index])) {
                    foreach ($request->reps[$index] as $seriesIndex => $reps) {
                        $exercise->sets()->create([
                            'rep_amount' => $reps ?? null,  // Asegúrate de usar el nombre de campo correcto
                            'weight' => $request->weight[$index][$seriesIndex] ?? null,
                        ]);
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
            'exercises' => 'required|json', // Validación del JSON de ejercicios
        ]);

        DB::transaction(function () use ($request, $routine) {
            // Actualizar la rutina
            $routine->update([
                'name' => $request->input('routine_name'),
                'description' => $request->input('description', null),
            ]);

            // Eliminar ejercicios antiguos
            $routine->exercises()->delete();

            // Obtener los ejercicios desde el JSON
            $exercisesData = json_decode($request->input('exercises'), true);

            // Crear los nuevos ejercicios
            foreach ($exercisesData as $exerciseData) {
                $exercise = Exercise::create([
                    'name' => $exerciseData['name'],
                    'mode' => $exerciseData['mode'],
                    'set_amount' => $exerciseData['sets'],
                    'rest' => $exerciseData['rest'],
                    'routine_id' => $routine->id,
                ]);

                // Guardar sets para cada ejercicio
                foreach ($exerciseData['reps'] as $seriesIndex => $reps) {
                    $exercise->sets()->create([
                        'rep_amount' => $reps,  // Cambiado para reflejar el campo correcto
                        'weight' => $exerciseData['weights'][$seriesIndex],
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
