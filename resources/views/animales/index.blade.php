@extends('layouts.template')
@section('titulo', 'Listado de Animales')
@section('contenido')
    <h1 class="text-3xl font-bold underline">Listado de Animales del Zoológico</h1>
    @foreach ($animales as $animal)
        <div class="flex bg-white p-6 rounded-lg shadow-md">
            @foreach ($imagenes as $imagen)
                @if ($animal->imagen_id == $imagen->id)
                    <img src="{{ asset('assets/imagenes/' . $imagen->nombre) }}" alt="{{ $animal->especie }}"
                        class="w-60 h-60  object-cover mr-4 rounded-md border-2 border-green-600 shadow-md">
                @endif
            @endforeach
            <div>
                <p>
                <h2 class="text-xl font-semibold mb-2">
                    <a href="{{ route('animales.show', $animal->slug) }}">{{ $animal->especie }}</a>
                </h2>
                Peso: {{ $animal->peso }}
                Altura:{{ $animal->altura }}
                FechaNac:{{ $animal->fechaNacimiento }}
                Alimentación: {{ $animal->alimentacion }}
                Descripción: {{ $animal->descripcion }}
                Revisiones:{{ count($animal->revisiones) }}</p>
                Cuidadores:
                @forelse ($animal->cuidadores as $cuidador)
                    <p> <a href="{{ route('cuidadores.show', $cuidador) }}">
                            {{ $cuidador->nombre }},
                        </a>
                    </p>
                @empty
                    <p>Sin cuidadores</p>
                @endforelse
    @endforeach
@endsection
