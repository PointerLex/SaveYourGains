<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="relative">

    <nav class="absolute top-0 left-0 w-full z-10 bg-transparent  text-white flex justify-center mt-10">
        <div class="flex lg:flex-1">
            <!-- Opcional: Logo aquí -->
        </div>
        <div class="flex lg:hidden">
            <!-- Botón de menú para dispositivos móviles aquí -->
        </div>
        <div class="hidden lg:flex lg:gap-x-12">
            <a href="{{ url('/') }}" class="text-sm font-semibold text-white hover:text-gray-300">Inicio</a>
            <a href="{{ route('aboutus') }}" class="text-sm font-semibold text-white hover:text-gray-300">Acerca de</a>
            <a href="{{ route('whysavemyprogress') }}" class="text-sm font-semibold text-white hover:text-gray-300">¿Por qué debo guardar mi progreso?</a>
            <a href="{{ route('howitworks') }}" class="text-sm font-semibold text-white hover:text-gray-300">Cómo funciona</a>
        </div>
        <div class="hidden lg:flex lg:flex-1 lg:justify-end">
            @guest
                <a href="{{ route('login') }}" class="text-sm font-semibold text-white hover:text-gray-300 mr-8">Iniciar sesión <span aria-hidden="true">&rarr;</span></a>
            @endguest
            @auth
                <a href="{{ route('clientDashboard') }}" class="text-sm font-semibold text-white">{{ auth()->user()->name }} {{ auth()->user()->surname }}</a>
                <!-- Opcional: Formulario de logout aquí -->
            @endauth
        </div>
    </nav>


    <main>
        @yield('content')
    </main>

</body>

</html>
