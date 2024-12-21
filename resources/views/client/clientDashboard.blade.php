@extends('layouts.clientNavBar')

@section('title', 'Save your gains | Inicio')

@section('content')
    <div class="container mx-auto mt-10">

        <div class="container mx-auto py-6 flex-grow">

            <div class="text-center animate-slide-down">
                <h2 class="text-white text-center text-4xl font-bold mb-5">Últimas sesiones registradas</h2>
                <p class="text-gray-400 text-center text-lg mb-10">Aquí puedes ver las últimas sesiones que has registrado.
                </p>
            </div>


            @if ($hasProgress)
                <div class="relative">
                    <button
                        class="relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-teal-300 to-lime-300 group-hover:from-teal-300 group-hover:to-lime-300 dark:text-white dark:hover:text-gray-900 focus:ring-4 focus:outline-none focus:ring-lime-200 dark:focus:ring-lime-800 transition ease-in-out delay-150 bg-blue-500 hover:-translate-y-1 hover:scale-110 hover:bg-indigo-500 duration-300">
                        <a href="{{ route('progress.index') }}"
                            class="text-green-700 dark:text-blue-400 dark:hover:text-blue-200 no-underline py-3 px-6 ">
                            Agregar nueva sesión</a>
                    </button>
                    <div class="flex overflow-x-auto hide-scroll-bar">
                        <div class="flex flex-nowrap space-x-6">
                            @foreach ($progresses as $day => $dayProgresses)
                                @foreach ($dayProgresses as $progress)
                                    <div class="relative bg-white rounded-lg shadow-md overflow-hidden flex-shrink-0 w-64">
                                        <img class="w-full h-64 object-cover" src="{{ $progress->routine->image_url }}"
                                            alt="{{ $progress->routine->name }}">

                                        <!-- Blur overlay -->
                                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>

                                        <!-- Text overlay -->
                                        <div class="absolute bottom-0 left-0 right-0 p-4 text-white">
                                            <h3 class="text-xl font-semibold ">
                                                {{ \Carbon\Carbon::parse($day)->format('l') }}</h3>
                                            <p class="text-gray-200 font-light">{{ $progress->routine->name }}</p>
                                            <p class="text-gray-200">{{ \Carbon\Carbon::parse($day)->format('d/m/Y') }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            @endforeach
                        </div>
                    </div>
                </div>
            @else
                <div class="px-8 py-16 animate-fade-in">
                    <div class="grid gap-8 items-start justify-center">
                        <div class="relative group">
                            <a href="{{ route('progress.index') }}" class="block">
                                <div
                                    class="absolute -inset-0.5 bg-gradient-to-r from-red-600 to-pink-600 rounded-lg blur opacity-75 group-hover:opacity-100 transition duration-1000 group-hover:duration-200 animate-tilt">
                                </div>
                                <button
                                    class="relative px-7 py-20 bg-black rounded-lg leading-none flex items-center divide-x divide-gray-600 w-full">
                                    <span class="flex items-center space-x-5">
                                        <p class="text-white font-medium">No tienes sesiones registradas. Puedes registrar
                                            tu
                                            progreso <span class="text-pink-500">aquí</span>.</p>
                                    </span>
                                </button>
                            </a>
                        </div>
                    </div>
                </div>

            @endif
        </div>
    @endsection
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: '¡Registro exitoso!',
                text: '{{ session('success') }}',
                confirmButtonText: 'Aceptar',
                background: '#1a202c', // Cambiar el fondo de la alerta
                color: '#fff', // Cambiar el color del texto
                customClass: {
                    popup: 'animate__animated animate__fadeInDown', // Animación al mostrar
                },
                showClass: {
                    popup: 'animate__animated animate__fadeInDown', // Animación al mostrar
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOut', // Animación al cerrar
                }
            });
        </script>
    @endif
