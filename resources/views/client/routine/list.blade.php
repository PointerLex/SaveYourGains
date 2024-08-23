@extends('layouts.clientNavBar')

@section('title', 'Save your gains | Tus rutinas guardadas')

@section('content')
    <div class="container mx-auto mt-10">
        <h2 class="text-3xl font-bold mb-5">Editar Rutina</h2>
        <p class="text-gray-600 mb-10 font-light">Clickea la rutina que necesites editar.</p>

        @if ($routines->isEmpty())

        <div class="flex items-center mt-20 p-4 mb-4 text-sm text-blue-800 border border-blue-300 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400 dark:border-blue-800" role="alert">
            <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
              <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
            </svg>
            <span class="sr-only">Info</span>
            <div>
              <span class="font-medium">¡Hey!</span> Aún no tiene rutinas creadas, puede crear su rutina <a
              href="{{ route('routines.create') }}" class="text-blue-500 font-semibold">aquí</a>.</p>
            </div>
          </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($routines as $routine)
                    <div class="relative bg-gray-900 rounded-lg shadow-lg overflow-hidden cursor-pointer"
                        onclick="location.href='{{ route('routines.edit', $routine->id) }}'">
                        <img src="{{ $routine->image_url }}" alt="Imagen de la rutina"
                            class="object-cover w-full h-48 opacity-50">
                        <div class="absolute inset-0 bg-gradient-to-r from-black to-transparent"></div>
                        <div class="absolute inset-0 p-4 text-white">
                            <h3 class="text-xl font-bold">{{ $routine->name }}</h3>
                            <ul class="mt-2">
                                @foreach ($routine->exercises->take(3) as $exercise)
                                    <li>{{ $exercise->name }}</li>
                                @endforeach
                                @if ($routine->exercises->count() > 3)
                                    <li class="text-sm text-gray-400">Ver más...</li>
                                @endif
                            </ul>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Paginación -->
            <div class="mt-6">
                {{ $routines->links() }}
            </div>
        @endif
    </div>
@endsection
