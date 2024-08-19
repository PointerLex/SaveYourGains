@extends('layouts.clientNavBar')

@section('title', 'Save your gains | Crear Rutina')

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
        @if (session('success'))
            <script>
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: '{{ session('success') }}',
                    showConfirmButton: false,
                    timer: 1500
                });
            </script>
        @endif
    </div>

    <script>
        let exercisesData = [];

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
                        <input type="text" name="exercise_name[${exerciseIndex}]" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer" placeholder=" " />
                        <label class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-yellow-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nombre del ejercicio</label>
                    </div>
                    <div class="relative z-0 w-full mb-6 group">
                        <input type="text" name="exercise_mode[${exerciseIndex}]" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer" placeholder=" " />
                        <label class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-yellow-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Modo del ejercicio</label>
                    </div>
                    <div class="relative z-0 w-full mb-6 group">
                        <input type="number" name="sets[${exerciseIndex}]" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer" placeholder=" " />
                        <label class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-yellow-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Cantidad de sets</label>
                    </div>
                    <div class="relative z-0 w-full mb-6 group">
                        <input type="text" name="rest[${exerciseIndex}]" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer" placeholder=" " />
                        <label class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-yellow-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Descanso por cada set</label>
                    </div>
                </div>
                <div id="series-container-${exerciseIndex}" class="col-span-2 grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Series will be added here dynamically -->
                </div>
                <button type="button" onclick="addSeries(${exerciseIndex})" class="text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-semibold rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Agregar serie</button>
                <button type="button" onclick="removeExercise(this)" class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-semibold rounded-full text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">Eliminar ejercicio</button>
                <button type="button" onclick="saveExercise(${exerciseIndex}, this)" class="text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-300 font-semibold rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-500 dark:hover:bg-blue-600 dark:focus:ring-blue-800">Guardar ejercicio</button>
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
                    <input type="number" name="reps[${exerciseIndex}][${seriesCount}]" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer" placeholder=" " />
                    <label class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-yellow-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Serie #${seriesCount +1} (Repeticiones)</label>
                </div>
                <div class="relative z-0 w-full mb-6 group">
                    <input type="number" name="weight[${exerciseIndex}][${seriesCount}]" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer" placeholder=" " />
                    <label class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-yellow-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Serie #${seriesCount +1} (Peso)</label>
                </div>
                <button type="button" onclick="removeSeries(this)" class="text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-4 focus:ring-red-300 font-semibold rounded-full text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">Eliminar serie</button>
            `;
            seriesContainer.appendChild(seriesDiv);
        }

        function removeSeries(button) {
            const seriesDiv = button.closest('.series');
            seriesDiv.remove();
        }

        function saveExercise(exerciseIndex, button) {
            const exerciseSection = button.closest('.exercise-section');
            const exerciseName = exerciseSection.querySelector(`[name="exercise_name[${exerciseIndex}]"]`).value;
            const exerciseMode = exerciseSection.querySelector(`[name="exercise_mode[${exerciseIndex}]"]`).value;
            const sets = exerciseSection.querySelector(`[name="sets[${exerciseIndex}]"]`).value;
            const rest = exerciseSection.querySelector(`[name="rest[${exerciseIndex}]"]`).value;

            const repsInputs = exerciseSection.querySelectorAll(`[name^="reps[${exerciseIndex}]"]`);
            const weightInputs = exerciseSection.querySelectorAll(`[name^="weight[${exerciseIndex}]"]`);

            const reps = Array.from(repsInputs).map(input => input.value);
            const weights = Array.from(weightInputs).map(input => input.value);

            // Validar que los campos requeridos estén llenos
            if (!exerciseName || !exerciseMode || !sets || !rest || reps.includes('') || weights.includes('')) {
                alert('Por favor completa todos los campos antes de guardar el ejercicio.');
                return;
            }

            exercisesData[exerciseIndex] = {
                name: exerciseName,
                mode: exerciseMode,
                sets: sets,
                rest: rest,
                reps: reps,
                weights: weights
            };

            alert('Ejercicio guardado correctamente.');
        }

        function submitForm() {
            // Agregar ejerciciosData al formulario
            const routineForm = document.getElementById('routine-form');
            const hiddenInput = document.createElement('input');
            hiddenInput.type = 'hidden';
            hiddenInput.name = 'exercises';
            hiddenInput.value = JSON.stringify(exercisesData);
            routineForm.appendChild(hiddenInput);
            routineForm.submit();
        }
    </script>
@endsection
