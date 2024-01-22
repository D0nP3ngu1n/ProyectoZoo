@extends('layouts.template')
@section('titulo', 'Editar Animal')
@section('contenido')
    <h1 class="text-3xl font-bold underline">Pagina para editar el animal {{ $animal['especie'] }}</h1>
    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-4 ml-4 mb-6" role="alert">
            <strong class="font-bold">Hubo errores al rellenar el formulario:</strong>
            <ul class="mt-3 list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('animales.update', $animal) }}" enctype="multipart/form-data" class="formulario">
        @csrf
        @method('put')
        <label for="especie">Especie:</label>
        <input type="text" name="especie" id="especie" value="{{ $animal->especie }}">
        <label for="peso">Peso:</label>
        <input type="text" name="peso" id="peso" value="{{ $animal->peso }}">
        <label for="altura">Altura:</label>
        <input type="text" name="altura" id="altura" value="{{ $animal->altura }}">
        <label for="fecha">Fecha de Nacimiento:</label>
        <input type="text" name="fecha" id="fecha" value="{{ $animal->fechaNacimiento }}">
        <label for="dieta">Alimentación:</label>
        <input type="text" name="dieta" id="dieta" value="{{ $animal->alimentacion }}">
        <label for="descripcion">Descripción:</label>
        <input type="text" name="descripcion" id="descripcion" value="{{ $animal->descripcion }}">
        <label for="imagen">Imagen:</label>
        <input type="file" name="imagen" id="imagen" value="{{ $animal->imagen }}">
        <img src="{{ asset('assets/imagenes/' . $animal->imagen) }}" alt="{{ $animal->especie }}" width="300px">
        <input type="submit" name="enviar" id="enviar" value="EDITAR" class="boton">
    @endsection
