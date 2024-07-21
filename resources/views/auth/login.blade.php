@extends('layouts.navbar')

@section('title', 'Save your gains | Iniciar sesión')

@section('content')
<style>
    .background-image {
        background-image: url('/images/loginImange.jpeg');
        background-size: cover;
        background-position: center;
    }
</style>

<div class="h-full flex">
    <div class="background-image w-1/2 h-screen hidden md:block">
        <!-- Imagen de fondo a la izquierda -->
    </div>

    <div class="flex w-full md:w-1/2 min-h-full flex-col justify-center px-6 py-20 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">INICIAR SESIÓN</h2>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
            <form class="space-y-6" action="{{ route('login.store') }}" method="POST" novalidate>
                @csrf
                <div>
                    <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Correo electrónico</label>
                    <div class="mt-2 relative">
                        <input id="email" name="email" type="email" autocomplete="email"
                            placeholder="usuario@ejemplo.cl" required
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 placeholder:px-1 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 pl-10">
                        @error('email')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4 7.00005L10.2 11.65C11.2667 12.45 12.7333 12.45 13.8 11.65L20 7" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                <rect x="3" y="5" width="18" height="14" rx="2" stroke="#000000" stroke-width="2" stroke-linecap="round"></rect>
                            </svg>
                        </div>
                    </div>
                </div>

                <div>
                    <div class="flex items-center justify-between">
                        <label for="password" class="block text-sm font-medium leading-6 text-gray-900">Contraseña</label>
                    </div>
                    <div class="mt-2 relative">
                        <input id="password" name="password" type="password" autocomplete="current-password"
                            placeholder="********" required
                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 pl-10">
                        @error('password')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-5 h-5" viewBox="-4.8 -4.8 57.60 57.60" xmlns="http://www.w3.org/2000/svg" fill="#000000" stroke="#000000" stroke-width="1.8240000000000003">
                                <path d="M24,25.28a3.26,3.26,0,0,0-1.64,6.07V36h3.32V31.35a3.28,3.28,0,0,0,1.61-2.8v0A3.27,3.27,0,0,0,24,25.28Z"></path>
                                <rect x="7.38" y="17.77" width="33.23" height="25.73" rx="4.32"></rect>
                                <path d="M13.35,17.77V15.16a10.66,10.66,0,0,1,21.32,0v2.61"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <div>
                    <button type="submit"
                        class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Entrar</button>
                </div>
                @if (@session('message'))
                    <div class="text-red-500 text-center">
                        <p>{{ session('message') }}</p>
                    </div>
                @endif
            </form>

            <p class="mt-10 text-center text-sm text-gray-500">
                ¿Ha olvidado su contraseña?
                <a href="#" class="font-semibold leading-6 text-red-600 hover:text-red-500">Recupérala aquí</a>
            </p>
        </div>
    </div>
</div>
@endsection
