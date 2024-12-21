@extends('layouts.clientNavBar')

@section('title', 'Save your gains | Registrar progreso')

@section('content')
    <div class="container mx-auto mt-10">
        <h2 class="text-3xl text-white text-center font-bold mb-5 ">Registrar tu progreso</h2>

        @if ($routines->isEmpty())
            <div class="text-center ">
                <h2 class="text-white text-center text-4xl font-bold mb-5 animate__slideInLeft ">Creo que no has creado
                    ninguna rutina por el momento...</h2>

            </div>

            <div class="px-8 py-16 animate-fade-in">
                <div class="grid gap-8 items-start justify-center">
                    <div class="relative group">
                        <a href="{{ route('customize-routine') }}" class="block">
                            <div
                                class="absolute -inset-0.5 bg-gradient-to-r from-red-600 to-pink-600 rounded-lg blur opacity-75 group-hover:opacity-100 transition duration-1000 group-hover:duration-200 animate-tilt">
                            </div>
                            <button
                                class="relative px-7 py-20 bg-black rounded-lg leading-none flex items-center divide-x divide-gray-600 w-full">
                                <span class="flex items-center space-x-5">
                                    <p class="text-white font-medium">No tienes rutinas registradas. Puedes registrar
                                        tu
                                        rutina <span class="text-pink-500">aquí</span>.</p>
                                </span>
                            </button>
                        </a>
                    </div>
                </div>
            </div>


            <script>
                Swal.fire({
                    icon: 'info',
                    title: 'No hay rutinas registradas',
                    text: 'Por favor, registre una rutina antes de continuar.',
                    color: '#fff',
                    background: '#1a202c',
                    showClass: {
                        popup: `
                        animate__animated
                        animate__fadeInUp
                        animate__faster
                        `
                    },
                    hideClass: {
                        popup: `
                            animate__animated
                            animate__fadeOutDown
                            animate__faster
                            `
                    },
                });
            </script>
        @else
            <p class="text-white font-light mb-4 text-center">Selecciona la rutina que realizaste y llena los detalles de cada
                ejercicio.</p>
            <div class="p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400"
                role="alert">
                <span class="font-medium">Recuerda que puedes registrar tu progreso en cualquier momento.</span>
            </div>
            <form method="POST" action="{{ route('progress.store') }}">
                @csrf

                <!-- Día y Hora de la rutina -->
                <div class="flex space-x-4 mb-6">
                    <!-- Día de la rutina -->
                    <div class="relative z-0 w-1/2 group">
                        <label for="day" class="block text-sm font-medium text-white">Día</label>
                        <input type="date" id="day" name="day" required
                            class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-yellow-500 focus:border-yellow-500 sm:text-sm">
                    </div>

                    <!-- Hora de la rutina -->
                    <div class="relative z-0 w-1/2 group">
                        <label for="time" class="block text-sm font-medium text-white">Hora</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 end-0 top-0 flex items-center pe-3.5 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4a1 1 0 1 0-2 0v4a1 1 0 0 0 .293.707l3 3a1 1 0 0 0 1.414-1.414L13 11.586V8Z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <input type="time" id="time" name="time" class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" min="09:00" max="18:00" value="00:00" required />
                        </div>
                    </div>
                </div>

                <!-- Seleccionar rutina -->
                <div class="relative z-0 w-full mb-6 group">
                    <label for="routine_id" class="block text-sm font-medium text-white">Rutina realizada</label>
                    <select id="routine_id" name="routine_id" required
                        class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-yellow-500 focus:border-yellow-500 sm:text-sm">
                        <option value="">Seleccione una rutina</option>
                        @foreach ($routines as $routine)
                            <option value="{{ $routine->id }}">{{ $routine->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Rutina seleccionada -->
                <div id="routine-details" class="mt-6 hidden">
                    <!-- Aquí se desplegarán los detalles de la rutina seleccionada -->
                    <!-- Implementa una sección para cada ejercicio de la rutina -->
                    @foreach ($routines as $routine)
                        <div class="routine-exercises hidden" data-routine-id="{{ $routine->id }}">
                            <h3 class="text-xl font-semibold">{{ $routine->name }}</h3>
                            @foreach ($routine->exercises as $exercise)
                                <div class="exercise-section border border-gray-300 rounded-lg p-6 mb-6">
                                    <h4 class="text-lg font-medium">{{ $exercise->name }}</h4>
                                    @foreach ($exercise->sets as $setIndex => $set)
                                        <div class="grid grid-cols-2 gap-6">
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700">Repeticiones</label>
                                                <input type="number" name="reps[{{ $exercise->id }}][{{ $setIndex }}]"
                                                    value="{{ $set->rep_amount }}"
                                                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-yellow-500 focus:border-yellow-500 sm:text-sm">
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-gray-700">Peso (kg)</label>
                                                <input type="number"
                                                    name="weight[{{ $exercise->id }}][{{ $setIndex }}]"
                                                    value="{{ $set->weight }}"
                                                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-yellow-500 focus:border-yellow-500 sm:text-sm">
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>

                <button type="submit"
                    class="text-white bg-yellow-500 hover:bg-yellow-600 focus:outline-none focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    Guardar Progreso
                </button>
            </form>
        @endif
    </div>
@endsection
