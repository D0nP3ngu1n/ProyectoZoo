@extends('layouts.template')
@section('titulo', 'Añadir Animal')
@section('contenido')
    <h1 class="text-3xl font-bold underline">Página para añadir un animal</h1>

    <form action="{{ route('animales.store') }}"method="POST" enctype="multipart/form-data" class="formulario">
        @csrf
        <label for="especie">Especie:</label>
        <input type="text" name="especie" id="especie">
        <label for="peso">Peso:</label>
        <input type="text" name="peso" id="peso">
        <label for="altura">Altura:</label>
        <input type="text" name="altura" id="altura">
        <label for="fechaNacimiento">Fecha de Nacimiento:</label>
        <input type="text" name="fechaNacimiento" id="fechaNacimiento">
        <label for="dieta">Alimentación:</label>
        <input type="text" name="dieta" id="dieta">
        <label for="descripcion">Descripción:</label>
        <input type="text" name="descripcion" id="descripcion">
        <label for="imagen">Imagen:</label>
        <input type="file" name="imagen" id="imagen">
        <input type="submit" name="enviar" id="enviar" value="CREAR" class="boton">
    @endsection
