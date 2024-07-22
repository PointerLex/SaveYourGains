<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    <nav class="flex items-center justify-between p-6 lg:px-8 z-20" aria-label="Global">
        <div class="flex lg:flex-1">
            {{-- <a href="#" class="-m-1.5 p-1.5">
                <span class="sr-only">Your Company</span>
                <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600"
                    alt="">
            </a> --}}
        </div>
        <div class="flex lg:hidden">
            <button type="button"
                class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
                <span class="sr-only">Open main menu</span>
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                    aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
            </button>
        </div>
        <div class="hidden lg:flex lg:gap-x-12">
            <a href="{{url('/')}}" class="text-sm font-semibold leading-6 text-gray-900">Inicio</a>
            <a href="{{route('aboutus')}}" class="text-sm font-semibold leading-6 text-gray-900">Acerca de</a>
            <a href="{{route('whysavemyprogress')}}" class="text-sm font-semibold leading-6 text-gray-900">¿Por qué debo guardar mi
                progreso?</a>
            <a href="{{route('howitworks')}}" class="text-sm font-semibold leading-6 text-gray-900">Cómo funciona</a>
        </div>
        <div class="hidden lg:flex lg:flex-1 lg:justify-end">
            @guest
                <a href="{{ route('login') }}" class="text-sm font-semibold leading-6 text-gray-900">Iniciar sesión <span
                        aria-hidden="true">&rarr;</span></a>
            @endguest

            @auth
                <a href="{{ route('clientDashboard') }}" class="text-sm font-semibold leading-6 text-gray-900">{{auth()->user()->name}} {{auth()->user()->surname}} </a>
                {{-- <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="text-sm font-semibold leading-6 text-gray-900">Cerrar sesión</button>
                </form> --}}
            @endauth
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

</body>

</html>
