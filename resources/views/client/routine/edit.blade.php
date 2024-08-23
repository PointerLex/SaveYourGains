@extends('layouts.clientNavBar')

@section('title', 'Editar Rutina')

@section('content')
    <div class="container mx-auto mt-10">
        <h2 class="text-3xl font-bold mb-5">Editar Rutina</h2>

        <form method="POST" action="{{ route('routines.update', $routine->id) }}">
            @csrf
            @method('PUT')

            <!-- Nombre de la Rutina -->
            <div class="relative z-0 w-full mb-6 group">
                <input type="text" name="routine_name" value="{{ $routine->name }}"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer"
                    placeholder=" " required />
                <label for="routine_name"
                    class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-yellow-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nombre de la rutina</label>
            </div>

            <!-- Ejercicios -->
            <div id="exercise-form">
                @foreach ($routine->exercises as $exerciseIndex => $exercise)
                    <div class="exercise-section border border-gray-300 rounded-lg p-6 mb-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="relative z-0 w-full mb-6 group">
                                <input type="text" name="exercise_name[{{ $exerciseIndex }}]" value="{{ $exercise->name }}"
                                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer"
                                    placeholder=" " required />
                                <label class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-yellow-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nombre del ejercicio</label>
                            </div>

                            <div class="relative z-0 w-full mb-6 group">
                                <input type="text" name="exercise_mode[{{ $exerciseIndex }}]" value="{{ $exercise->mode }}"
                                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer"
                                    placeholder=" " required />
                                <label class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-yellow-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Modo del ejercicio</label>
                            </div>

                            <div class="relative z-0 w-full mb-6 group">
                                <input type="number" name="sets[{{ $exerciseIndex }}]" value="{{ $exercise->set_amount }}"
                                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer"
                                    placeholder=" " required />
                                <label class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-yellow-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Cantidad de sets</label>
                            </div>

                            <div class="relative z-0 w-full mb-6 group">
                                <input type="text" name="rest[{{ $exerciseIndex }}]" value="{{ $exercise->rest }}"
                                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer"
                                    placeholder=" " required />
                                <label class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-yellow-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Descanso por cada set</label>
                            </div>
                        </div>

                        <!-- Series -->
                        <div id="series-container-{{ $exerciseIndex }}" class="col-span-2 grid grid-cols-1 md:grid-cols-2 gap-6">
                            @foreach ($exercise->sets as $setIndex => $set)
                                <div class="series grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div class="relative z-0 w-full mb-6 group">
                                        <input type="number" name="reps[{{ $exerciseIndex }}][{{ $setIndex }}]" value="{{ $set->rep_amount }}"
                                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer"
                                            placeholder=" " required />
                                        <label class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-yellow-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Serie #{{ $setIndex + 1 }} (Repeticiones)</label>
                                    </div>

                                    <div class="relative z-0 w-full mb-6 group">
                                        <input type="number" name="weight[{{ $exerciseIndex }}][{{ $setIndex }}]" value="{{ $set->weight }}"
                                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-yellow-500 peer"
                                            placeholder=" " required />
                                        <label class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-yellow-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Serie #{{ $setIndex + 1 }} (Peso)</label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <button type="button" onclick="addSeries({{ $exerciseIndex }})" class="text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-semibold rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Agregar serie</button>
                        <button type="button" onclick="removeExercise(this)" class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-semibold rounded-full text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">Eliminar ejercicio</button>
                    </div>
                @endforeach
            </div>

            <button type="button" onclick="addExercise()" class="text-white bg-yellow-500 hover:bg-yellow-600 focus:outline-none focus:ring-4 focus:ring-yellow-300 font-semibold rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-yellow-400 dark:hover:bg-yellow-500 dark:focus:ring-yellow-600">Agregar ejercicio</button>

            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-semibold rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Guardar cambios</button>
        </form>
    </div>

    <script>
        function addExercise() {
            // Implementar lógica para agregar dinámicamente un nuevo ejercicio
        }

        function removeExercise(button) {
            const exerciseSection = button.closest('.exercise-section');
            exerciseSection.remove();
        }

        function addSeries(exerciseIndex) {
            // Implementar lógica para agregar dinámicamente una nueva serie
        }
    </script>
@endsection
