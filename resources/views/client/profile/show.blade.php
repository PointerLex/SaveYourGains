@extends('layouts.clientNavBar')

@section('title', 'Save your gains | Perfil de usuario')

@section('content')
    <div class="container mx-auto mt-10">
        @if (session('success'))
            <div class="bg-green-500 text-white p-4 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif

        <h2 class="text-3xl font-bold mb-5">Perfil de usuario</h2>

        <div class="flex items-center">
            <div class="w-32 h-32 rounded-full overflow-hidden border-4 border-gray-300">
                @if ($user->profile_picture)
                    <img src="{{ $user->profile_picture }}" alt="Foto de perfil" class="object-cover w-full h-full">
                @else
                    <img src="{{ asset('images/default_profile.png') }}" alt="Foto de perfil predeterminada"
                        class="object-cover w-full h-full">
                @endif
            </div>
            <div class="ml-6">
                <h3 class="text-2xl font-semibold">{{ $user->name }}</h3>
                <p class="text-gray-600">{{ $user->email }}</p>
            </div>
        </div>

        <div class="mt-8">
            <h3 class="text-xl font-semibold mb-4">Actualizar foto de perfil</h3>
            <form action="{{ route('profile.updatePicture') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="profile_picture" class="block text-gray-700 font-medium mb-2">Seleccione su nueva foto de
                        perfil</label>
                    <input type="file" name="profile_picture" id="profile_picture" accept="image/*"
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer focus:outline-none">
                    @error('profile_picture')
                        <span class="text-red-500 text-sm mt-2">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit"
                    class="relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-cyan-500 to-blue-500 group-hover:from-cyan-500 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-cyan-200 dark:focus:ring-cyan-800">
                    <span
                        class="relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                        Guardar cambios
                    </span>
                </button>

            </form>
        </div>
    </div>
@endsection
