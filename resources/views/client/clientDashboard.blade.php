@extends('layouts.clientNavBar')

@section('title', 'Save your gains | Inicio')

@section('content')
    <div class="container mx-auto mt-10">
        <h2 class="text-3xl font-bold mb-5">Últimas sesiones registradas</h2>

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
                                    <img class="w-full h-64 object-cover"
                                         src="{{ $progress->routine->image_url }}" alt="{{ $progress->routine->name }}">

                                    <!-- Blur overlay -->
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>

                                    <!-- Text overlay -->
                                    <div class="absolute bottom-0 left-0 right-0 p-4 text-white">
                                        <h3 class="text-xl font-semibold ">{{ \Carbon\Carbon::parse($day)->format('l') }}</h3>
                                        <p class="text-gray-200 font-light">{{ $progress->routine->name}}</p>
                                        <p class="text-gray-200">{{ \Carbon\Carbon::parse($day)->format('d/m/Y') }}</p>
                                    </div>
                                </div>
                            @endforeach
                        @endforeach
                    </div>
                </div>
            </div>
        @else
            <div class="p-4 mb-4 mt-12 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400">
                <p class="text-gray-700 font-semibold">No tienes sesiones registradas. Puedes registrar tu progreso <a
                        href="{{ route('progress.index') }}" class="text-blue-500 underline">aquí</a>.</p>
            </div>
        @endif
    </div>
@endsection
