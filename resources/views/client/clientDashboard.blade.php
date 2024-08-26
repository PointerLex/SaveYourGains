@extends('layouts.clientNavBar')

@section('title', 'Save your gains | Inicio')

@section('content')
    <div class="container mx-auto mt-10">
        <h2 class="text-3xl font-bold mb-5">Últimas sesiones registradas</h2>

        @if ($hasProgress)
            <div class="relative">
                <div class="flex overflow-x-auto hide-scroll-bar">
                    <div class="flex flex-nowrap space-x-6">
                        @foreach ($progresses as $day => $dayProgresses)
                            <div class="bg-white rounded-lg shadow-md overflow-hidden flex-shrink-0 w-64">
                                <img class="w-full h-48 object-cover" src="{{ asset('images/' . strtolower($day) . '.jpg') }}"
                                    alt="{{ $day }}">
                                <div class="p-6">
                                    <h3 class="text-xl font-semibold mb-2">{{ $day }}</h3>
                                    @foreach ($dayProgresses as $progress)
                                        <p class="text-gray-600">{{ $progress->routine->name }}</p>
                                    @endforeach
                                </div>
                            </div>
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
