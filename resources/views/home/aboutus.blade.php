@extends('layouts.navbar')


@section('title', 'Save your gains | Acerca de nosotros')

@section('content')
    <div class="min-h-screen bg-black flex items-center justify-center" style="background-image: url('{{ asset('images/home-bg.png') }}'); background-size: cover; background-position: center;">

        <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
            <!-- background effect -->
        </div>

        <div class="container mx-auto text-white text-left z-10">
            <h1 class="text-4xl font-bold mb-6">Acerca de nosostros</h1>
            <p class="text-lg font-light">@POINTERLEX</p>
            <p class="text-lg">Creé esta aplicación para facilitar mi rendimiento en el gym y poder guardar mi progreso.</p>

        </div>

    </div>


@endsection
