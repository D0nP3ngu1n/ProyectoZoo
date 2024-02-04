@extends('layouts.template')
@section('titulo', 'Detalle de animal')
@section('contenido')
    <h1 class="text-3xl font-bold underline">Detalle del animal {{ $animal->especie }}</h1>
    <div class="columns-2">
        <div class="flex bg-white p-6 rounded-lg shadow-md items-center">
            <img src="{{ asset('assets/imagenes/' . $imagen->nombre) }}" alt="{{ $animal->especie }}"
                class="w-60 h-60  object-cover mr-4 rounded-md border-2 border-green-600 shadow-md">

            <div>
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
                    Cuidadores:
                    @forelse ($animal->cuidadores as $cuidador)
                        <p> <a href="{{ route('cuidadores.show', $cuidador) }}">
                                {{ $cuidador->nombre }},
                            </a>
                        </p>
                    @empty
                        <p>Sin cuidadores</p>
                    @endforelse
                </p>
            </div>
            <a href="{{ route('animales.index') }}" class="boton">Volver</a>
            <a href="{{ route('animales.edit', $animal->slug) }}" class="boton">Editar</a>
            <a href="{{ route('revisiones.crear', $animal->slug) }}" class="boton">Nueva revision</a>
            <form action="{{ route('animales.destroy', $animal, $imagen) }}" method="post">
                @csrf
                @method('delete')
                <input type="submit" value="eliminar animal" class="boton" />
            </form>
        @endsection
