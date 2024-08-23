@extends('layouts.clientNavBar')

@section('title', 'Save your gains | Personaliza tu rutina')

@section('content')
    <div class="container mx-auto mt-10">
        <h2 class="text-3xl font-bold mb-5">Personaliza tu rutina</h2>
        <p class="text-gray-600 mb-10">Aquí puedes crear, editar o eliminar la rutina que necesites.</p>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-12">
            <a href="{{ route('routines.create') }}" class="block bg-white rounded-lg shadow-md overflow-hidden transform transition-transform duration-500 hover:scale-105">
                <div class="relative w-full h-96 flex items-center justify-center">
                    <img class="absolute inset-0 w-full h-full object-cover" src="{{ asset('images/create-routine.jpeg') }}" alt="Crear Rutina">
                    <div class="relative z-10 text-center text-white">
                        <h3 class="text-2xl font-semibold mb-2">Crear rutina</h3>
                        <p class="text-gray-200">Si no tienes una rutina aún, aquí es donde puedes crearla</p>
                    </div>
                    <div class="absolute inset-0 bg-black opacity-50"></div>
                </div>
            </a>
            <a href="{{ route('routines.list') }}" class="block bg-white rounded-lg shadow-md overflow-hidden transform transition-transform duration-500 hover:scale-105">
                <div class="relative w-full h-96 flex items-center justify-center">
                    <img class="absolute inset-0 w-full h-full object-cover" src="{{ asset('images/edit-routine.jpeg') }}" alt="Editar Rutina">
                    <div class="relative z-10 text-center text-white">
                        <h3 class="text-2xl font-semibold mb-2">Editar rutina</h3>
                        <p class="text-gray-200">Puedes modificar los ejercicios cuando quieras</p>
                    </div>
                    <div class="absolute inset-0 bg-black opacity-50"></div>
                </div>
            </a>
            <a href="{{ route('routines.index') }}" class="block bg-white rounded-lg shadow-md overflow-hidden transform transition-transform duration-500 hover:scale-105">
                <div class="relative w-full h-96 flex items-center justify-center">
                    <img class="absolute inset-0 w-full h-full object-cover" src="{{ asset('images/delete-routine.jpeg') }}" alt="Eliminar Rutina">
                    <div class="relative z-10 text-center text-white">
                        <h3 class="text-2xl font-semibold mb-2">Eliminar rutina</h3>
                        <p class="text-gray-200">Si no te ha gustado la rutina que has creado, puedes eliminarla</p>
                    </div>
                    <div class="absolute inset-0 bg-black opacity-50"></div>
                </div>
            </a>
        </div>
    </div>
@endsection
