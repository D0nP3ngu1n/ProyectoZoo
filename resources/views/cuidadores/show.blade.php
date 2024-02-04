@extends('layouts.plantilla')

@section('titulo', 'Zoológico')

@section('contenido')
    <div class="max-w-3xl mx-auto mt-10 p-6 bg-white rounded shadow-md">
        <h1 class="text-4xl font-bold mb-6 text-green-800 text-center underline">
            Vista detallada del cuidador {{ $cuidador->nombre }}
        </h1>

        <div class="ml-8 mt-4">
            @foreach ($cuidador->titulaciones() as $titulacion)
                <div class="mb-4">
                    <p class="text-lg">
                        <span class="font-bold">Título:</span>
                        <a href="{{ route('titulaciones.show', $titulacion) }}" class="text-blue-500 hover:underline">
                            {{ $titulacion->nombre }}
                        </a>
                    </p>
                </div>
            @endforeach
        </div>

        <div class="ml-8 mt-6">
            <a href="/animales"
                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded
                    focus:outline-none focus:shadow-outline">
                Volver al listado de animales
            </a>
        </div>
    </div>
@endsection
