@extends('layouts.clientNavBar')

@section('title', 'Crear Rutina')

@section('content')
    <div class="container mx-auto mt-10">
        <h2 class="text-3xl font-bold mb-5">Crea tu rutina</h2>
        <p class="text-gray-600 mb-10">Para poder crear tu rutina debes llenar los campos. Si tienes dudas no dudes en
            consultar la información.</p>

        <form id="routine-form" method="POST" action="{{ route('routines.store') }}">
            @csrf
            <!-- Nombre de la rutina -->
            <div class="relative z-0 w-full mb-6 group">
                <input type="text" name="routine_name" id="routine_name"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer"
                    placeholder=" " oninput="checkRoutineName()" />
                <label for="routine_name"
                    class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-yellow-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nombre
                    de la rutina</label>
            </div>

            <!-- Formulario de ejercicios -->
            <div id="exercise-form" class="opacity-0 transform scale-95 transition-opacity duration-500">
                <div id="exercises-container">
                    <!-- Aquí se agregarán los ejercicios -->
                </div>
                <button type="button" onclick="addExercise()"
                    class="text-white bg-yellow-500 hover:bg-yellow-600 focus:outline-none focus:ring-4 focus:ring-yellow-300 font-semibold rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-yellow-400 dark:hover:bg-yellow-500 dark:focus:ring-yellow-600">Agregar
                    ejercicio</button>
                <button type="button" id="save-routine-button"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-semibold rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 opacity-0 transform scale-95 transition-opacity duration-500"
                    onclick="submitForm()">Guardar rutina</button>
            </div>
        </form>
    </div>

    <script>
        function checkRoutineName() {
            const routineName = document.getElementById('routine_name').value;
            const exerciseForm = document.getElementById('exercise-form');
            const saveRoutineButton = document.getElementById('save-routine-button');
            if (routineName.trim() !== '') {
                exerciseForm.classList.remove('opacity-0', 'scale-95');
                exerciseForm.classList.add('opacity-100', 'scale-100');
                saveRoutineButton.classList.remove('opacity-0', 'scale-95');
                saveRoutineButton.classList.add('opacity-100', 'scale-100');
            } else {
                exerciseForm.classList.remove('opacity-100', 'scale-100');
                exerciseForm.classList.add('opacity-0', 'scale-95');
                saveRoutineButton.classList.remove('opacity-100', 'scale-100');
                saveRoutineButton.classList.add('opacity-0', 'scale-95');
            }
        }

        function addExercise() {
            const exercisesContainer = document.getElementById('exercises-container');
            const exerciseIndex = document.querySelectorAll('.exercise-section').length;

            const newExercise = document.createElement('div');
            newExercise.className = 'exercise-section border border-gray-300 rounded-lg p-6 mb-6';

            const exerciseContent = `
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="relative z-0 w-full mb-6 group">
                        <input type="text" name="exercise_name[${exerciseIndex}]" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer" placeholder="Nombre del ejercicio" />
                        <label class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-yellow-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nombre del ejercicio</label>
                    </div>
                    <div class="relative z-0 w-full mb-6 group">
                        <input type="text" name="exercise_mode[${exerciseIndex}]" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer" placeholder="Modo del ejercicio" />
                        <label class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-yellow-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Modo del ejercicio</label>
                    </div>
                    <div class="relative z-0 w-full mb-6 group">
                        <input type="number" name="sets[${exerciseIndex}]" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer" placeholder="Cantidad de sets" />
                        <label class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-yellow-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Cantidad de sets</label>
                    </div>
                    <div class="relative z-0 w-full mb-6 group">
                        <input type="text" name="rest[${exerciseIndex}]" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer" placeholder="Descanso por cada set" />
                        <label class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-yellow-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Descanso por cada set</label>
                    </div>
                </div>
                <div id="series-container-${exerciseIndex}" class="col-span-2 grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Series will be added here dynamically -->
                </div>
                <button type="button" onclick="addSeries(${exerciseIndex})" class="text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-semibold rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Agregar serie</button>
                <button type="button" onclick="removeExercise(this)" class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-semibold rounded-full text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">Eliminar ejercicio</button>
            `;

            newExercise.innerHTML = exerciseContent;
            exercisesContainer.appendChild(newExercise);
        }

        function removeExercise(button) {
            const exerciseSection = button.closest('.exercise-section');
            exerciseSection.remove();
        }

        function addSeries(exerciseIndex) {
            const seriesContainer = document.getElementById('series-container-' + exerciseIndex);
            const seriesCount = seriesContainer.getElementsByClassName('series').length;

            const seriesDiv = document.createElement('div');
            seriesDiv.className = 'series grid grid-cols-1 md:grid-cols-2 gap-6';
            seriesDiv.innerHTML = `
                <div class="relative z-0 w-full mb-6 group">
                    <input type="number" name="reps[${exerciseIndex}][${seriesCount}]" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer" placeholder="Reps" />
                    <label class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-yellow-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Reps</label>
                </div>
                <div class="relative z-0 w-full mb-6 group">
                    <input type="number" name="weight[${exerciseIndex}][${seriesCount}]" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer" placeholder="Peso" />
                    <label class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-yellow-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Peso</label>
                </div>
            `;
            seriesContainer.appendChild(seriesDiv);
        }

        function submitForm() {
            document.getElementById('routine-form').submit();
        }
    </script>
@endsection
