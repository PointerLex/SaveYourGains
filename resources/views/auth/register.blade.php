@extends('layouts.navbar')

@section('title', 'Save your gains | Registrarse')

@section('content')
    <div  class="min-h-screen bg-black flex flex-col justify-center"
        style="background-image: url('{{ asset('images/home-bg.png') }}'); background-size: cover; background-position: center;">
        <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
            <!-- background effect -->
        </div>


        <div id="loader" class="hidden fixed inset-0 bg-black bg-opacity-75 items-center justify-center z-50">
            <div class="text-center">
                <div role="status">
                    <svg aria-hidden="true" class="inline w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600"
                        viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                            fill="currentColor" />
                        <path
                            d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                            fill="currentFill" />
                    </svg>
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
        </div>

        <div id = "registerForm" class="container mx-auto flex flex-col md:flex-row items-center justify-center z-10">

            <div class="w-full md:w-1/3 p-2">
                <h1 class="text-8xl font-semibold text-center md:text-left mt-12 relative text-white">Regístrate</h1>
                <p class="text-center md:text-left text-base font-thin text-gray-300 mt-3 z-10">Complete el formulario para
                    iniciar su registro</p>
            </div>

            <div class="w-full md:w-1/2 p-2">

                <form class="max-w-sm mx-auto mt-12 flex flex-col justify-center z-10" method="POST"
                    action="{{ route('register.store') }}" novalidate>
                    @csrf
                    <label for="name" class="block -mb-1 text-sm font-semibold text-white">Nombre</label>
                    <div class="relative">
                        <div class="relative inset-y-0 left-0 top-7 flex items-center pl-3.5">
                            <svg class = "w-4 h-4" fill="#ffff" viewBox="0 0 32 32" version="1.1"
                                xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <title>user</title>
                                    <path
                                        d="M4 28q0 0.832 0.576 1.44t1.44 0.576h20q0.8 0 1.408-0.576t0.576-1.44q0-1.44-0.672-2.912t-1.76-2.624-2.496-2.144-2.88-1.504q1.76-1.088 2.784-2.912t1.024-3.904v-1.984q0-3.328-2.336-5.664t-5.664-2.336-5.664 2.336-2.336 5.664v1.984q0 2.112 1.024 3.904t2.784 2.912q-1.504 0.544-2.88 1.504t-2.496 2.144-1.76 2.624-0.672 2.912z">
                                    </path>
                                </g>
                            </svg>
                        </div>
                        <input type="text" id="name" name="name" required
                            class="block w-full rounded-md border-0 bg-transparent py-2 text-slate-50 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 placeholder:px-1 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 pl-10"
                            placeholder="Ingrese su nombre aquí">

                        @error('name')
                            <div id="toast-danger"
                                class="z-50 flex items-center w-full max-w-s p-2 mt-1 -mb-2.5 rounded-lg shadow text-gray-400 bg-gray-800">
                                <div
                                    class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8  rounded-lg bg-red-800 text-red-200">
                                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z" />
                                    </svg>
                                    <span class="sr-only">Error icon</span>
                                </div>
                                <div class="ms-3 text-sm font-normal">{{ $message }}</div>
                            </div>
                        @enderror
                    </div>

                    <label for="surname" class="block -mb-1 text-sm text-white font-semibold mt-4">Apellido</label>
                    <div class="relative">
                        <div class="relative top-7 inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                            <svg class="w-4 h-4" fill="#b0b0b0" viewBox="0 0 32 32" version="1.1"
                                xmlns="http://www.w3.org/2000/svg" stroke="#b0b0b0">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path
                                        d="M4 28q0 0.832 0.576 1.44t1.44 0.576h20q0.8 0 1.408-0.576t0.576-1.44q0-1.44-0.672-2.912t-1.76-2.624-2.496-2.144-2.88-1.504q1.76-1.088 2.784-2.912t1.024-3.904v-1.984q0-3.328-2.336-5.664t-5.664-2.336-5.664 2.336-2.336 5.664v1.984q0 2.112 1.024 3.904t2.784 2.912q-1.504 0.544-2.88 1.504t-2.496 2.144-1.76 2.624-0.672 2.912z">
                                    </path>
                                </g>
                            </svg>
                        </div>
                        <input type="text" id="surname" name="surname" required
                            class="block w-full rounded-md border-0 bg-transparent py-2 px-12 text-slate-50 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 placeholder:px-1 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 pl-10"
                            placeholder="Ingrese su apellido">
                        @error('surname')
                            <div id="toast-danger"
                                class="z-50 flex items-center w-full max-w-s p-2 mt-1 -mb-2.5 rounded-lg shadow text-gray-400 bg-gray-800">
                                <div
                                    class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8  rounded-lg bg-red-800 text-red-200">
                                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z" />
                                    </svg>
                                    <span class="sr-only">Error icon</span>
                                </div>
                                <div class="ms-3 text-sm font-normal">{{ $message }}</div>
                            </div>
                        @enderror
                    </div>


                    <label for="email" class="block -mb-1 text-sm font-semibold text-white dark:text-white mt-4">Correo
                        electrónico</label>
                    <div class="relative">
                        <div class="relative top-7 inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                            <svg class ="w-5 h-5" viewBox="-2.4 -2.4 28.80 28.80" fill="none"
                                xmlns="http://www.w3.org/2000/svg" stroke="#6b7280">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"
                                    stroke="#CCCCCC" stroke-width="0.9120000000000001"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path
                                        d="M16 12C16 14.2091 14.2091 16 12 16C9.79086 16 8 14.2091 8 12C8 9.79086 9.79086 8 12 8C14.2091 8 16 9.79086 16 12ZM16 12V13.5C16 14.8807 17.1193 16 18.5 16V16C19.8807 16 21 14.8807 21 13.5V12C21 7.02944 16.9706 3 12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21H16"
                                        stroke="#ffff" stroke-width="1.8240000000000003" stroke-linecap="round"
                                        stroke-linejoin="round"></path>
                                </g>
                            </svg>
                        </div>
                        <input type="text" id="email" name="email" required
                            class="block w-full rounded-md border-0 bg-transparent py-2 text-slate-50 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 placeholder:px-1 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 pl-10"
                            placeholder="Ingrese su correo electrónico">
                        @error('email')
                            <div id="toast-danger"
                                class="z-50 flex items-center w-full max-w-s p-2 mt-1 -mb-2.5 rounded-lg shadow text-gray-400 bg-gray-800">
                                <div
                                    class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8  rounded-lg bg-red-800 text-red-200">
                                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z" />
                                    </svg>
                                    <span class="sr-only">Error icon</span>
                                </div>
                                <div class="ms-3 text-sm font-normal">{{ $message }}</div>
                            </div>
                        @enderror
                    </div>

                    <label for="phone"
                        class="block -mb-1 text-sm font-semibold text-white dark:text-white mt-4">Teléfono</label>
                    <div class="relative">
                        <div class="relative top-6 inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                            <svg class = "w-4 h-4"fill="#ffff" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path
                                        d="M11.748 5.773S11.418 5 10.914 5c-.496 0-.754.229-.926.387S6.938 7.91 6.938 7.91s-.837.731-.773 2.106c.054 1.375.323 3.332 1.719 6.058 1.386 2.72 4.855 6.876 7.047 8.337 0 0 2.031 1.558 3.921 2.191.549.173 1.647.398 1.903.398.26 0 .719 0 1.246-.385.536-.389 3.543-2.807 3.543-2.807s.736-.665-.119-1.438c-.859-.773-3.467-2.492-4.025-2.944-.559-.459-1.355-.257-1.699.054-.343.313-.956.828-1.031.893-.112.086-.419.365-.763.226-.438-.173-2.234-1.148-3.899-3.426-1.655-2.276-1.837-3.02-2.084-3.824a.56.56 0 0 1 .225-.657c.248-.172 1.161-.933 1.161-.933s.591-.583.344-1.27-1.906-4.716-1.906-4.716z">
                                    </path>
                                </g>
                            </svg>
                        </div>
                        <input type="text" id="phone" name="phone" required
                            class="block w-full rounded-md border-0 bg-transparent py-1.5 text-slate-50 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 placeholder:px-1 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 pl-10"
                            placeholder="Ingrese su teléfono">
                        @error('phone')
                            <div id="toast-danger"
                                class="z-50 flex items-center w-full max-w-s p-2 mt-1 -mb-2.5 rounded-lg shadow text-gray-400 bg-gray-800">
                                <div
                                    class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8  rounded-lg bg-red-800 text-red-200">
                                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z" />
                                    </svg>
                                    <span class="sr-only">Error icon</span>
                                </div>
                                <div class="ms-3 text-sm font-normal">{{ $message }}</div>
                            </div>
                        @enderror
                    </div>

                    <label for="password"
                        class="block -mb-1 text-sm font-semibold text-white dark:text-white mt-4">Contraseña</label>
                    <div class="relative">
                        <div class="relative top-7 inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                            <svg class="w-4 h-4" fill="#ffff" viewBox="0 0 35 35" data-name="Layer 2"
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
                        </div>
                        <input type="password" id="password" name="password"
                            class="block w-full rounded-md border-0 bg-transparent py-1.5 text-slate-50 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 placeholder:px-1 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 pl-10"
                            placeholder="*************">
                        @error('password')
                            <div id="toast-danger"
                                class="z-50 flex items-center w-full max-w-s p-2 mt-1 -mb-2.5 rounded-lg shadow text-gray-400 bg-gray-800">
                                <div
                                    class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8  rounded-lg bg-red-800 text-red-200">
                                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z" />
                                    </svg>
                                    <span class="sr-only">Error icon</span>
                                </div>
                                <div class="ms-3 text-sm font-normal">{{ $message }}</div>
                            </div>
                        @enderror
                    </div>

                    <button type="submit"
                        class="text-white relative bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mb-2 mt-6">
                        Registrarse
                    </button>


                </form>
                <div id="loader" class="hidden">
                    <svg class="animate-spin h-5 w-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                            stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path>
                    </svg>
                    <span>Loading...</span>
                </div>

            </div>
        </div>
    </div>


    <script>
        document.getElementById('registerForm').addEventListener('submit', function() {
            var loader = document.getElementById('loader');
            loader.classList.remove('hidden');
            loader.classList.add('flex'); // Añadimos 'flex' aquí para mostrar el loader correctamente
            document.getElementById('registerForm').classList.add('hidden');
        });
    </script>

@endsection
