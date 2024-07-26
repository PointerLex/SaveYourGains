@extends('layouts.navbar')

@section('title', 'Save your gains | Inicio')

@section('content')

    <div class="bg-white">

        <div class="relative isolate px-6 pt-14 lg:px-8">

            <div class="mx-auto max-w-2xl py-32 sm:py-48 lg:py-56">
                <div class="text-center">
                    <h1 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-6xl">¿Qué tan lejos has llegado?</h1>
                    <h1 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-2xl mt-6">¡Anota tu progreso y
                        descubre tu verdadero potencial!</h1>
                    <p class="mt-6 text-lg leading-8 text-gray-600">No anotar tus entrenamientos puede hacer que realices
                        los mismos ejercicios con los mismos pesos y repeticiones, lo que puede llevar a un estancamiento en
                        tus ganancias y progreso.</p>
                    <div class="mt-10 flex items-center justify-center gap-x-6">
                        <a href="{{ route('register') }}"
                            class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">¡Registrarse
                            ya!</a>
                        <a href="#" class="text-sm font-semibold leading-6 text-gray-900">Leer más... <span
                                aria-hidden="true">→</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
