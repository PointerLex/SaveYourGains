@extends('layouts.navbar')

@section('title', 'Save your gains | Iniciar sesión')

@section('content')

    <div class="min-h-screen bg-black flex flex-col justify-center"
        style="background-image: url('{{ asset('images/home-bg.png') }}'); background-size: cover; background-position: center;">
        <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
            <!-- background effect -->
        </div>

        <h1 class="text-4xl font-semibold text-center mt-12 relative text-white ">Iniciar sesión</h1>
        <p class="text-center text-base font-thin text-gray-300  mt-2 z-10">¡Inicia sesión para poder guardar tus datos y tu
            progreso!</p>

        <div class="flex w-full  min-h-full flex-col justify-center px-6 py-12 lg:px-8 z-10">

            <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                <form class="space-y-6" action="{{ route('login.store') }}" method="POST" novalidate>
                    @csrf
                    <div>
                        <label for="email" class="block text-sm font-semibold leading-6 text-white">Correo
                            electrónico</label>
                        <div class="mt-2 relative">
                            <svg class="w-5 h-5 relative top-7 left-3" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M4 7.00005L10.2 11.65C11.2667 12.45 12.7333 12.45 13.8 11.65L20 7" stroke="#ffff"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                </path>
                                <rect x="3" y="5" width="18" height="14" rx="2" stroke="#ffff"
                                    stroke-width="2" stroke-linecap="round"></rect>
                            </svg>

                            <input id="email" name="email" type="email" autocomplete="email"
                                placeholder="usuario@ejemplo.cl" required
                                class="block w-full rounded-md border-0 bg-transparent py-1.5 text-slate-50 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 placeholder:px-1 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 pl-10">
                            @error('email')
                                <div class="flex items-center p-3 mb-4 mt-4 text-sm text-red-800 rounded-lg bg-gray-800 dark:bg-gray-800 dark:text-red-400"
                                    role="alert">
                                    <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                                    </svg>
                                    <div>
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                    </div>
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <div class="flex items-center justify-between">
                            <label for="password" class="block text-sm font-semibold leading-6 text-white">Contraseña
                            </label>
                        </div>
                        <div class="mt-2 relative">
                            <svg class="w-4 h-4 relative top-6 left-3" fill="#ffff" viewBox="0 0 35 35" data-name="Layer 2"
                                id="a6b678a2-3714-46f6-ad50-598977cf64a4" xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path
                                        d="M27.137,34.75H7.862a4.8,4.8,0,0,1-4.79-4.791V15.614a4.8,4.8,0,0,1,4.79-4.791H27.137a4.8,4.8,0,0,1,4.791,4.791V29.959A4.8,4.8,0,0,1,27.137,34.75ZM7.862,13.323a2.292,2.292,0,0,0-2.29,2.291V29.959a2.292,2.292,0,0,0,2.29,2.291H27.137a2.293,2.293,0,0,0,2.291-2.291V15.614a2.293,2.293,0,0,0-2.291-2.291Z">
                                    </path>
                                    <path
                                        d="M25.537,13.323a1.25,1.25,0,0,1-1.25-1.25V8.608a5.409,5.409,0,0,0-1.935-4.082A7.253,7.253,0,0,0,17.5,2.75c-3.744,0-6.79,2.628-6.79,5.858v3.465a1.25,1.25,0,0,1-2.5,0V8.608C8.207,4,12.375.25,17.5.25a9.748,9.748,0,0,1,6.511,2.4,7.869,7.869,0,0,1,2.779,5.955v3.465A1.25,1.25,0,0,1,25.537,13.323Z">
                                    </path>
                                    <path
                                        d="M17.5,25.779a1.25,1.25,0,0,1-1.25-1.25V21.2a1.25,1.25,0,0,1,2.5,0v3.334A1.25,1.25,0,0,1,17.5,25.779Z">
                                    </path>
                                </g>
                            </svg>
                            <input id="password" name="password" type="password" autocomplete="current-password"
                                placeholder="********" required
                                class="block w-full rounded-md border-0 py-1.5 bg-transparent text-slate-50 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 pl-10">
                            @error('password')
                                <div class="flex items-center p-3 mb-4 mt-4 text-sm text-red-800 rounded-lg bg-gray-800 dark:bg-gray-800 dark:text-red-400"
                                    role="alert">
                                    <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                                    </svg>
                                    <div>
                                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>

                                    </div>
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <button type="submit"
                            class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500
                            focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                        >Entrar
                        </button>
                    </div>
                    @if (@session('message'))
                        <div class="flex items-center p-3 mb-4 mt-4 text-sm text-red-800 rounded-lg bg-gray-800 dark:bg-gray-800 dark:text-red-400"
                            role="alert">
                            <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                            </svg>
                            <div>
                                <p class="text-red-500 text-sm mt-1">{{ session('message') }}</p>
                            </div>
                        </div>
                    @endif
                </form>

                <p class="mt-10 text-center font-semibold text-sm text-gray-300">
                    ¿Aún no tiene cuenta?
                    <a href="{{ route('register') }}"
                        class="font-bold leading-6 text-indigo-600 hover:text-indigo-400">Registrese aquí</a>
                </p>

                <p class="mt-4 text-center font-semibold text-sm text-gray-300">
                    ¿Ha olvidado su contraseña?
                    <a href="#" class="font-bold leading-6 text-indigo-600 hover:text-indigo-400">Recupérala
                        aquí</a>
                </p>


            </div>
        </div>

    </div>

@endsection
