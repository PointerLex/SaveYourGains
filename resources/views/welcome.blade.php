@extends('layouts.navbar')

@section('title', 'Save your gains | Inicio')

@section('content')

    <div class="min-h-screen bg-black flex items-center justify-center"
        style="background-image: url('{{ asset('images/home-bg.png') }}'); background-size: cover; background-position: center;">

        <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
            <!-- background effect -->
        </div>

        <div class="text-center text-white p-12 z-10">
            <h1 class="text-7xl font-bold">¿Qué tan lejos has llegado?</h1>
            <p class="mt-4 font-semibold text-xl">¡Anota tu progreso y descubre tu verdadero potencial!</p>
            <p class="mt-2 font-light text-lg">No anotar tus entrenamientos puede hacer que realices los mismos ejercicios
                con<br />
                los mismos pesos y repeticiones, lo que puede llevar a un estancamiento en tus ganancias y progreso.</p>
            <div class="mt-6">
                <a href="{{ route('register') }}"
                    class="inline-block bg-indigo-600 px-5 py-3 rounded shadow-lg font-semibold hover:bg-indigo-700 transition duration-300 transform ease-in-out hover:scale-105">¡Registrarse
                    ya!</a>
                <a href="#" class="inline-block text-sm text-gray-300 hover:text-gray-100 ml-4">Leer más...</a>
            </div>
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const elements = document.querySelectorAll('.text-center, .mt-6 a');
                elements.forEach(element => {
                    element.style.opacity = 0;
                    element.style.transform = 'translateX(-20px)';
                    setTimeout(() => {
                        element.style.transition = 'opacity 1s ease-out, transform 0.5s ease-out';
                        element.style.opacity = 1;
                        element.style.transform = 'translateX(0)';
                    }, 100);
                });
            });
        </script>
    </div>

@endsection
