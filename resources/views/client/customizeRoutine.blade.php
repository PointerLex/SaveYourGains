@extends('layouts.clientNavBar')

@section('title', 'Save your gains | Personaliza tu rutina')

@section('content')

    <style>
        /* Hide scrollbar for all elements */
        * {
            scrollbar-width: none;
            /* Firefox */
        }

        *::-webkit-scrollbar {
            display: none;
            /* Chrome, Safari, Opera */
        }
    </style>

    <div class="bg-black min-h-screen text-white flex flex-col">
        <div class="container mx-auto py-10 flex-grow">

            <div class="text-center animate-slide-down ">
                <h2 class="text-5xl font-bold mb-5 text-white text-center ">Personaliza tu rutina</h2>
                <p class="text-gray-400 text-xl mb-10 text-center">Aquí puedes crear, editar o eliminar la rutina que necesites.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-12">
                <!-- Tarjeta 1: Crear Rutina -->
                <div class="px-2 py-16 ">
                    <div class="relative group">
                        <div
                            class="absolute -inset-0.5 bg-gradient-to-r from-pink-600 to-purple-600 rounded-lg blur opacity-75 group-hover:opacity-100 transition duration-1000 group-hover:duration-200 animate-tilt">
                        </div>
                        <a href="{{ route('routines.create') }}"
                            class="relative group rounded-2xl overflow-hidden bg-gradient-to-b from-slate-800 to-slate-900 hover:bg-[radial-gradient(circle,_rgba(144,205,244,0.25)_0%,_rgba(59,130,246,0.5)_100%)] transition-all duration-500 ">
                            <div class="relative z-10 w-full h-96 flex items-center justify-center">
                                <img class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-110 group-hover:blur-sm rounded-md brightness-50"
                                    src="{{ asset('images/create-routine.jpeg') }}" alt="Crear Rutina">
                                <div class="relative z-10 text-center text-white">
                                    <h3
                                        class="text-2xl  font-semibold mb-2 transition-transform duration-500 group-hover:scale-110">
                                        Crear rutina</h3>
                                    <p class="text-gray-200 transition-transform duration-500 group-hover:scale-110">Si no
                                        tienes una rutina aún, aquí es donde puedes crearla</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Tarjeta 2: Editar Rutina -->
                <div class="px-2 py-16 ">
                    <div class="relative group">
                        <div
                            class="absolute -inset-0.5 bg-gradient-to-r from-green-600 to-teal-600 rounded-lg blur opacity-75 group-hover:opacity-100 transition duration-1000 group-hover:duration-200 animate-tilt">
                        </div>
                        <a href="{{ route('routines.list') }}"
                            class="relative group rounded-2xl overflow-hidden bg-gradient-to-b from-slate-800 to-slate-900 hover:bg-[radial-gradient(circle,_rgba(72,187,120,0.25)_0%,_rgba(34,197,94,0.5)_100%)] transition-all duration-500">
                            <div class="relative z-10 w-full h-96 flex items-center justify-center">
                                <img class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-110 group-hover:blur-sm rounded-md brightness-50"
                                    src="{{ asset('images/edit-routine.jpeg') }}" alt="Editar Rutina">
                                <div class="relative z-10 text-center text-white">
                                    <h3
                                        class="text-2xl font-semibold mb-2 transition-transform duration-500 group-hover:scale-110">
                                        Editar rutina</h3>
                                    <p class="text-gray-200 transition-transform duration-500 group-hover:scale-110">Puedes
                                        modificar los ejercicios cuando quieras</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Tarjeta 3: Eliminar Rutina -->
                <div class="px-2 py-16 ">
                    <div class="relative group">
                        <div
                            class="absolute -inset-0.5 bg-gradient-to-r from-red-600 to-orange-600 rounded-lg blur opacity-75 group-hover:opacity-100 transition duration-1000 group-hover:duration-200 animate-tilt">
                        </div>
                        <a href="{{ route('routines.index') }}"
                            class="relative group rounded-2xl overflow-hidden bg-gradient-to-b from-slate-800 to-slate-900 hover:bg-[radial-gradient(circle,_rgba(248,113,113,0.25)_0%,_rgba(220,38,38,0.5)_100%)] transition-all duration-500 ">
                            <div class="relative z-10 w-full h-96 flex items-center justify-center">
                                <img class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-110 group-hover:blur-sm rounded-md brightness-50"
                                    src="{{ asset('images/delete-routine.jpeg') }}" alt="Eliminar Rutina">
                                <div class="relative z-10 text-center text-white">
                                    <h3
                                        class="text-2xl font-semibold mb-2 transition-transform duration-500 group-hover:scale-110">
                                        Eliminar rutina</h3>
                                    <p class="text-gray-200 transition-transform duration-500 group-hover:scale-110">Si no
                                        te ha gustado la rutina que has creado, <br /> puedes eliminarla</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.grid > div');
            cards.forEach((card, index) => {
                card.style.opacity = 0;
                card.style.transform = 'translateX(-100px)';
                setTimeout(() => {
                    card.style.transition = 'opacity 0.5s ease-out, transform 0.5s ease-out';
                    card.style.opacity = 1;
                    card.style.transform = 'translateX(0)';
                }, index * 200);
            });
        });
    </script>
@endsection
