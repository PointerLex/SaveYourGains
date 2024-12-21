@extends('layouts.clientNavBar')

@section('title', 'Save your gains | Crear Rutina')

@section('content')
    <div class="container mx-auto mt-10">
        <h2 class="text-white text-center text-4xl py-2 font-semibold mb-5 animate__animated animate__fadeIn">Crea tu rutina
        </h2>
        <p class="text-gray-400 text-center text-lg mb-10 animate__animated animate__fadeIn">Para poder crear tu rutina debes
            llenar los campos. Si tienes
            dudas no dudes en consultar la información.</p>

        <!-- Actualiza el formulario para manejar archivos -->
        <form id="routine-form" method="POST" action="{{ route('routines.store') }}" enctype="multipart/form-data">
            @csrf
            <!-- Nombre de la rutina -->
            <div class="flex justify-center mb-5 animate__animated animate__fadeIn">
                <div class="w-1/3">
                    <label for="routine_name"
                        class="block mb-2 text-base font-medium text-white dark:text-gray-900 text-center">Ingrese
                        el nombre de su rutina</label>
                    <input type="text" name="routine_name" id="routine_name"
                        class="bg-transparent text-white border-b-1 border-t-0 border-x-0 border-gray-300 text-sm block w-full p-2.5 dark:bg-transparent dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-900 text-center">
                </div>
            </div>

            <!-- Imagen de la rutina -->
            <div class="flex justify-center mb-5">
                <div class="w-1/3 animate__animated animate__fadeIn">
                    <label for="routine_image"
                        class="flex flex-col items-center justify-center w-full h-full py-14 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-transparent dark:hover:bg-gray-800 dark:bg-gray-700 hover:bg-gray-900 dark:border-gray-600 dark:hover:border-gray-500 text-white">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                            </svg>
                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400" id="upload-text"><span
                                    class="font-semibold">Click to
                                    upload</span> or drag and drop</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400" id="upload-text-validation" >SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                        </div>
                        <input name="routine_image" id="routine_image" type="file" class="hidden"
                            onchange="updateUploadText()" />
                    </label>
                </div>
            </div>
    </div>

    <!-- Formulario de ejercicios -->
    <div id="exercise-form" class="transform scale-100 transition-opacity duration-500 animate__animated animate__fadeIn">
        <div id="exercises-container">
            <!-- Aquí se agregarán los ejercicios -->
        </div>
        <div class="flex justify-center space-x-4">
            <button type="button" onclick="addExercise()"
                class="text-white bg-yellow-500 hover:bg-yellow-600 focus:outline-none font-semibold rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-yellow-400 ">Agregar
                ejercicio</button>
            <button type="button" id="save-routine-button"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-semibold rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                onclick="submitForm()">Guardar rutina</button>
        </div>
    </div>
    </form>

    @if (session('success'))
        <script>
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: '{{ session('success') }}',
                background: '#1a202c',
                showConfirmButton: false,
                timer: 1500
            });
        </script>
    @endif
    </div>

    <script>
        let exercisesData = [];

        function addExercise() {
            const exercisesContainer = document.getElementById('exercises-container');
            const exerciseIndex = document.querySelectorAll('.exercise-section').length;

            const newExercise = document.createElement('div');
            newExercise.className =
                'exercise-section border border-gray-300 rounded-lg p-6 mb-6 animate__animated animate__fadeInLeft w-1/2 mx-auto';

            const exerciseContent = `
<div class="grid grid-cols-1 md:grid-cols-2 gap-6 ">
    <div class="relative z-0 w-full mb-6 group">
        <input type="text" name="exercise_name[${exerciseIndex}]" class="block py-2.5 px-0 w-1/2 text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-500 peer" placeholder=" " />
        <label class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nombre del ejercicio</label>
    </div>
    <div class="relative z-0 w-full mb-6 group">
        <input type="text" name="exercise_mode[${exerciseIndex}]" class="block py-2.5 px-0 w-1/2 text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-500 peer" placeholder=" " />
        <label class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Modo del ejercicio</label>
    </div>
    <div class="relative z-0 w-full mb-6 group">
        <input type="number" name="sets[${exerciseIndex}]" class="block py-2.5 px-0 w-1/2 text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-500 peer" placeholder=" " />
        <label class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Cantidad de sets</label>
    </div>
    <div class="relative z-0 w-full mb-6 group">
        <input type="text" name="rest[${exerciseIndex}]" class="block py-2.5 px-0 w-1/2 text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-500 peer" placeholder=" " />
        <label class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Descanso por cada set</label>
    </div>
</div>
<div id="series-container-${exerciseIndex}" class="flex flex-col gap-6">
    <!-- Series will be added here dynamically -->
</div>
<button type="button" onclick="addSeries(${exerciseIndex})" class="text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-semibold rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Agregar serie</button>
<button type="button" onclick="removeExercise(this)" class="text-white bg-red-900 hover:bg-red-500 focus:outline-none focus:ring-4 focus:ring-gray-300 font-semibold rounded-full text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">Eliminar ejercicio</button>
`;

            newExercise.innerHTML = exerciseContent;
            exercisesContainer.appendChild(newExercise);
        }

        function removeExercise(button) {
            const exerciseSection = button.closest('.exercise-section');
            exerciseSection.classList.add('animate__animated', 'animate__fadeOutLeft');
            exerciseSection.addEventListener('animationend', () => {
                exerciseSection.remove();
            });
        }

        function addSeries(exerciseIndex) {
            const seriesContainer = document.getElementById('series-container-' + exerciseIndex);
            const seriesCount = seriesContainer.getElementsByClassName('series').length;

            const seriesDiv = document.createElement('div');
            seriesDiv.className =
                'series flex flex-row items-center gap-6 border border-gray-300 rounded-lg p-4 mb-4 w-full';
            seriesDiv.innerHTML =
                `
        <div class="relative z-0 w-1/2 mb-6 group">
            <input type="number" name="reps[${exerciseIndex}][${seriesCount}]" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-500 peer" placeholder=" " />
            <label class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Serie #${seriesCount +1} (Repeticiones)</label>
        </div>
        <div class="relative z-0 w-1/2 mb-6 group">
            <input type="number" name="weight[${exerciseIndex}][${seriesCount}]" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-500 peer" placeholder=" " />
            <label class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Serie #${seriesCount +1} (Peso)</label>
        </div>
        <button type="button" onclick="removeSeries(this)" class="text-red-700 w-1/4 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900 transition duration-300">Eliminar serie</button>`;
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

        function updateUploadText() {
            const uploadText = document.getElementById('upload-text');
            uploadText.textContent = '¡Imagen subida exitosamente!';

            const uploadTextValidation = document.getElementById('upload-text-validation');
            uploadTextValidation.textContent = '';

        }
    </script>


@endsection
