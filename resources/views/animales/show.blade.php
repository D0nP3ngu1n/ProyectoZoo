@extends('layouts.template')
@section('titulo', 'Detalle de animal')
@section('contenido')
    <h1 class="text-3xl font-bold underline">Detalle del animal {{ $animal->especie }}</h1>
    <div class="columns-2">
        <img src="{{ asset('assets/imagenes/' . $animal->imagen) }}" alt="{{ $animal->especie }}">
        <p>Especie: {{ $animal->especie }}
            Peso: {{ $animal->peso }}
            Altura:{{ $animal->altura }}
            FechaNac:{{ $animal->fechaNacimiento }}
            Alimentación: {{ $animal->alimentacion }}
            Descripción: {{ $animal->descripcion }}
            Revisiones:
            @foreach ($animal->revisiones as $revision)
                <p>
                    Fecha: {{ $revision->fecha }}
                    Descripcion:{{ $revision->descripcion }}
                </p>
            @endforeach
        </p>
    </div>
    <a href="{{ route('animales.index') }}" class="boton">Volver</a>
    <a href="{{ route('animales.edit', $animal->especie) }}" class="boton">Editar</a>
@endsection
