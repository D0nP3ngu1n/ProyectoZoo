@extends('layouts.template')
@section('titulo', 'Listado de Animales')
@section('contenido')
    <h1 class="text-3xl font-bold underline">Listado de Animales del Zoológico</h1>
    @foreach ($animales as $animal)
        <a href="{{ route('animales.show', 0) }}" class="boton">Ver</a>
        <img src="{{ asset('assets/imagenes/' . $animal->imagen) }}" alt="{{ $animal->especie }}">
        <p> Especie: {{ $animal->especie }}
            Peso: {{ $animal->peso }}
            Altura:{{ $animal->altura }}
            FechaNac:{{ $animal->fechaNacimiento }}
            Alimentación: {{ $animal->alimentacion }}
            Descripción: {{ $animal->descripcion }}</p>
    @endforeach
@endsection
