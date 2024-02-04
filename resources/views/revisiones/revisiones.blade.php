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

    <form action="{{ route('revisiones.store'), $animal }}" method="POST" enctype="multipart/form-data" class="formulario">
        @csrf
        <h1>Nueva revision</h1>
        <label for="fecha">Fecha:</label>
        <input type="date" name="fecha" id="fecha">
        <label for="descripcion">Descripcion:</label>
        <input type="fecha" name="descripcion" id="descripcion">
        <input type="submit" name="enviar" id="enviar" value="CREAR" class="boton">
    @endsection
