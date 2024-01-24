@extends('layouts.template')
@section('titulo', 'Añadir Animal')
@section('contenido')
    <h1 class="text-3xl font-bold underline">Página para añadir un animal</h1>

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

    <form action="{{ route('animales.store') }}" method="POST" enctype="multipart/form-data" class="formulario">
        @csrf
        <label for="especie">Especie:</label>
        <input type="text" name="especie" id="especie">
        @error('especie')
            <span class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-4 ml-4 mb-6"
                role="alert"> {{ $message }} </span>
        @enderror
        <label for="peso">Peso:</label>
        <input type="text" name="peso" id="peso">
        <label for="altura">Altura:</label>
        <input type="text" name="altura" id="altura">
        <label for="fechaNacimiento">Fecha de Nacimiento:</label>
        <input type="date" name="fechaNacimiento" id="fechaNacimiento">
        <label for="dieta">Alimentación:</label>
        <input type="text" name="dieta" id="dieta">
        <label for="descripcion">Descripción:</label>
        <input type="text" name="descripcion" id="descripcion">
        <label for="imagen">Imagen:</label>
        <input type="file" name="imagen" id="imagen">
        <input type="submit" name="enviar" id="enviar" value="CREAR" class="boton">
    @endsection
