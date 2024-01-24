@extends('layouts.template')
@section('titulo', 'Listado de Animales')
@section('contenido')
    <h1 class="text-3xl font-bold underline">Listado de Animales del Zoológico</h1>
    @foreach ($animales as $animal)
        <img src="{{ asset('assets/imagenes/' . $animal->imagen) }}" alt="{{ $animal->especie }}">
        <p>
        <h2 class="text-xl font-semibold mb-2">
            <a href="{{ route('animales.show', $animal->especie) }}">{{ $animal->especie }}</a>
        </h2>
        Peso: {{ $animal->peso }}
        Altura:{{ $animal->altura }}
        FechaNac:{{ $animal->fechaNacimiento }}
        Alimentación: {{ $animal->alimentacion }}
        Descripción: {{ $animal->descripcion }}</p>
    @endforeach
@endsection
