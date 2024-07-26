@extends('layouts.clientNavBar')

@section('title', 'Save your gains | Inicio')

@section('content')
    <div class="container mx-auto mt-10">
        <h2 class="text-3xl font-bold mb-5">Últimas sesiones registradas</h2>
        <p class="text-gray-600 mb-10">Último día de registro: 12/12/2024</p>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            {{-- <div class="bg-white rounded-lg shadow-md overflow-hidden transform transition-transform duration-500 hover:scale-105">
                <img class="w-full h-48 object-cover" src="{{ asset('images/monday.jpg') }}" alt="Lunes">
                <div class="p-6">
                    <h3 class="text-xl font-semibold mb-2">Lunes</h3>
                    <p class="text-gray-600">Push</p>
                    <p class="text-gray-600">Mejor ejercicio: Press banca</p>
                    <p class="text-gray-600">Mayor peso: 100 kg</p>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow-md overflow-hidden transform transition-transform duration-500 hover:scale-105">
                <img class="w-full h-48 object-cover" src="{{ asset('images/tuesday.jpg') }}" alt="Martes">
                <div class="p-6">
                    <h3 class="text-xl font-semibold mb-2">Martes</h3>
                    <p class="text-gray-600">Pull</p>
                    <p class="text-gray-600">Mejor ejercicio: Pullups lastrado</p>
                    <p class="text-gray-600">Mayor peso: peso corporal + 10 kg</p>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow-md overflow-hidden transform transition-transform duration-500 hover:scale-105">
                <img class="w-full h-48 object-cover" src="{{ asset('images/wednesday.jpg') }}" alt="Miércoles">
                <div class="p-6">
                    <h3 class="text-xl font-semibold mb-2">Miércoles</h3>
                    <p class="text-gray-600">Leg</p>
                    <p class="text-gray-600">Mejor ejercicio: Squats</p>
                    <p class="text-gray-600">Mayor peso: 150 kg</p>
                </div>
            </div> --}}
        </div>
    </div>
@endsection
