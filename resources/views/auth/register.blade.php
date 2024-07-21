@extends('layouts.navbar')

@section('title', 'Save your gains | Registrarse')

@section('content')

    <h1 class="text-3xl font-semibold text-center mt-12">Regístrate</h1>
    <p class="text-center text-gray-500 dark:text-gray-400 mt-2">¡Únete a nuestra comunidad!</p>

    <form class="max-w-sm mx-auto mt-12 felx justify-center" method="POST"  action="{{route('register.store')}}" novalidate>
        @csrf
        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre</label>
        <div class="relative">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                <svg class = "w-4 h-4" fill="#000000" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>user</title> <path d="M4 28q0 0.832 0.576 1.44t1.44 0.576h20q0.8 0 1.408-0.576t0.576-1.44q0-1.44-0.672-2.912t-1.76-2.624-2.496-2.144-2.88-1.504q1.76-1.088 2.784-2.912t1.024-3.904v-1.984q0-3.328-2.336-5.664t-5.664-2.336-5.664 2.336-2.336 5.664v1.984q0 2.112 1.024 3.904t2.784 2.912q-1.504 0.544-2.88 1.504t-2.496 2.144-1.76 2.624-0.672 2.912z"></path> </g></svg>
            </div>
            <input type="text" id="name" name="name" required
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-3.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Ingrese su nombre aquí">
                @error('name')
                    <p class="text-red-500 text-sm mt-2">{{$message}}</p>
                @enderror
        </div>

        <label for="surname"
            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white mt-4">Apellido</label>
        <div class="relative">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                <svg class="w-4 h-4" fill="#b0b0b0" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg" stroke="#b0b0b0"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <title>user</title> <path d="M4 28q0 0.832 0.576 1.44t1.44 0.576h20q0.8 0 1.408-0.576t0.576-1.44q0-1.44-0.672-2.912t-1.76-2.624-2.496-2.144-2.88-1.504q1.76-1.088 2.784-2.912t1.024-3.904v-1.984q0-3.328-2.336-5.664t-5.664-2.336-5.664 2.336-2.336 5.664v1.984q0 2.112 1.024 3.904t2.784 2.912q-1.504 0.544-2.88 1.504t-2.496 2.144-1.76 2.624-0.672 2.912z"></path> </g></svg>
            </div>
            <input type="text" id="surname" name="surname" required
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Ingrese su apellido aquí">
                @error('surname')
                    <p class="text-red-500 text-sm mt-2">{{$message}}</p>
                @enderror
        </div>


        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white mt-4">Correo
            electrónico</label>
        <div class="relative">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                <svg class ="w-5 h-5" viewBox="-2.4 -2.4 28.80 28.80" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#6b7280"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" stroke="#CCCCCC" stroke-width="0.9120000000000001"></g><g id="SVGRepo_iconCarrier"> <path d="M16 12C16 14.2091 14.2091 16 12 16C9.79086 16 8 14.2091 8 12C8 9.79086 9.79086 8 12 8C14.2091 8 16 9.79086 16 12ZM16 12V13.5C16 14.8807 17.1193 16 18.5 16V16C19.8807 16 21 14.8807 21 13.5V12C21 7.02944 16.9706 3 12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21H16" stroke="#000000" stroke-width="1.8240000000000003" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
            </div>
            <input type="text" id="email" name="email" required
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Ingrese su correo electrónico aquí">
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{$message}}</p>
                @enderror
        </div>

        <label for="phone"
            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white mt-4">Teléfono</label>
        <div class="relative">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                <svg class = "w-4 h-4"fill="#000000" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M11.748 5.773S11.418 5 10.914 5c-.496 0-.754.229-.926.387S6.938 7.91 6.938 7.91s-.837.731-.773 2.106c.054 1.375.323 3.332 1.719 6.058 1.386 2.72 4.855 6.876 7.047 8.337 0 0 2.031 1.558 3.921 2.191.549.173 1.647.398 1.903.398.26 0 .719 0 1.246-.385.536-.389 3.543-2.807 3.543-2.807s.736-.665-.119-1.438c-.859-.773-3.467-2.492-4.025-2.944-.559-.459-1.355-.257-1.699.054-.343.313-.956.828-1.031.893-.112.086-.419.365-.763.226-.438-.173-2.234-1.148-3.899-3.426-1.655-2.276-1.837-3.02-2.084-3.824a.56.56 0 0 1 .225-.657c.248-.172 1.161-.933 1.161-.933s.591-.583.344-1.27-1.906-4.716-1.906-4.716z"></path></g></svg>
            </div>
            <input type="text" id="phone" name="phone" required
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Ingrese su teléfono aquí">
                @error('phone')
                    <p class="text-red-500 text-sm mt-1">{{$message}}</p>
                @enderror
        </div>

        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white mt-4">Contraseña</label>
        <div class="relative">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                <svg class="w-4 h-4" fill="#000000" viewBox="0 0 35 35" data-name="Layer 2" id="a6b678a2-3714-46f6-ad50-598977cf64a4" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M27.137,34.75H7.862a4.8,4.8,0,0,1-4.79-4.791V15.614a4.8,4.8,0,0,1,4.79-4.791H27.137a4.8,4.8,0,0,1,4.791,4.791V29.959A4.8,4.8,0,0,1,27.137,34.75ZM7.862,13.323a2.292,2.292,0,0,0-2.29,2.291V29.959a2.292,2.292,0,0,0,2.29,2.291H27.137a2.293,2.293,0,0,0,2.291-2.291V15.614a2.293,2.293,0,0,0-2.291-2.291Z"></path><path d="M25.537,13.323a1.25,1.25,0,0,1-1.25-1.25V8.608a5.409,5.409,0,0,0-1.935-4.082A7.253,7.253,0,0,0,17.5,2.75c-3.744,0-6.79,2.628-6.79,5.858v3.465a1.25,1.25,0,0,1-2.5,0V8.608C8.207,4,12.375.25,17.5.25a9.748,9.748,0,0,1,6.511,2.4,7.869,7.869,0,0,1,2.779,5.955v3.465A1.25,1.25,0,0,1,25.537,13.323Z"></path><path d="M17.5,25.779a1.25,1.25,0,0,1-1.25-1.25V21.2a1.25,1.25,0,0,1,2.5,0v3.334A1.25,1.25,0,0,1,17.5,25.779Z"></path></g></svg>
            </div>
            <input type="password" id="password" name="password"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="*************">
                @error('password')
                    <p class="text-red-500 text-sm mt-1">{{$message}}</p>
                @enderror
        </div>


        <button type="submit" class="text-white bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mb-2 mt-6">Registrarse</button>


    </form>



@endsection
