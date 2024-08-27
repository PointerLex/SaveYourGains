@extends('layouts.clientNavBar')

@section('title', 'Save your gains | Registrar progreso')

@section('content')
<div class="container mx-auto mt-10">
    <h2 class="text-3xl font-bold mb-5">Registrar tu progreso</h2>

    {{-- <p class="text-gray-600 font-light mb-4">Recuerda que puedes registrar tu progreso en cualquier momento.</p> --}}
    <p class="text-gray-600 font-light mb-4">Selecciona la rutina que realizaste y llena los detalles de cada ejercicio.</p>
    <div class="p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">
        <span class="font-medium">Recuerda que puedes registrar tu progreso en cualquier momento.</span>
      </div>
    <form method="POST" action="{{ route('progress.store') }}">
        @csrf

        <!-- Día de la rutina -->
        <div class="relative z-0 w-full mb-6 group">
            <label for="day" class="block text-sm font-medium text-gray-700">Día</label>
            <input type="date" id="day" name="day" required
                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-yellow-500 focus:border-yellow-500 sm:text-sm">
        </div>

        <!-- Hora de la rutina -->
        <div class="relative z-0 w-full mb-6 group">
            <label for="time" class="block text-sm font-medium text-gray-700">Hora</label>
            <input type="time" id="time" name="time" required
                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-yellow-500 focus:border-yellow-500 sm:text-sm">
        </div>

        <!-- Seleccionar rutina -->
        <div class="relative z-0 w-full mb-6 group">
            <label for="routine_id" class="block text-sm font-medium text-gray-700">Rutina realizada</label>
            <select id="routine_id" name="routine_id" required
                class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-yellow-500 focus:border-yellow-500 sm:text-sm">
                <option value="">Seleccione una rutina</option>
                @foreach($routines as $routine)
                    <option value="{{ $routine->id }}">{{ $routine->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Rutina seleccionada -->
        <div id="routine-details" class="mt-6 hidden">
            <!-- Aquí se desplegarán los detalles de la rutina seleccionada -->
            <!-- Implementa una sección para cada ejercicio de la rutina -->
            @foreach($routines as $routine)
                <div class="routine-exercises hidden" data-routine-id="{{ $routine->id }}">
                    <h3 class="text-xl font-semibold">{{ $routine->name }}</h3>
                    @foreach($routine->exercises as $exercise)
                        <div class="exercise-section border border-gray-300 rounded-lg p-6 mb-6">
                            <h4 class="text-lg font-medium">{{ $exercise->name }}</h4>
                            @foreach($exercise->sets as $setIndex => $set)
                                <div class="grid grid-cols-2 gap-6">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Repeticiones</label>
                                        <input type="number" name="reps[{{ $exercise->id }}][{{ $setIndex }}]" value="{{ $set->rep_amount }}"
                                            class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-yellow-500 focus:border-yellow-500 sm:text-sm">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700">Peso (kg)</label>
                                        <input type="number" name="weight[{{ $exercise->id }}][{{ $setIndex }}]" value="{{ $set->weight }}"
                                            class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-yellow-500 focus:border-yellow-500 sm:text-sm">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>

        <button type="submit" class="text-white bg-yellow-500 hover:bg-yellow-600 focus:outline-none focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
            Guardar Progreso
        </button>
    </form>
</div>

<script>
    document.getElementById('routine_id').addEventListener('change', function () {
        var selectedRoutine = this.value;
        var routineDetails = document.getElementById('routine-details');
        var allRoutines = document.querySelectorAll('.routine-exercises');

        routineDetails.classList.add('hidden');
        allRoutines.forEach(function(routine) {
            routine.classList.add('hidden');
        });

        if (selectedRoutine) {
            routineDetails.classList.remove('hidden');
            document.querySelector('.routine-exercises[data-routine-id="' + selectedRoutine + '"]').classList.remove('hidden');
        }
    });
</script>
@endsection
