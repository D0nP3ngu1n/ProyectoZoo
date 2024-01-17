@extends('layouts.template')
@section('titulo', 'Añadir Animal')
@section('contenido')
    <h1 class="text-3xl font-bold underline">Página para añadir un animal</h1>

    <form action="{{ route() }}"method="POST" enctype="multipart/form-data" class="formulario">
        <input type="text" name="especie" id="especie">
        <input type="text" name="peso" id="peso">
        <input type="text" name="altura" id="altura">
        <input type="text" name="fecha" id="fecha">
        <input type="text" name="dieta" id="dieta">
        <input type="text" name="descripcion" id="descripcion">
        <input type="file" name="imagen" id="imagen">
        <input type="submit" name="enviar" id="enviar" value="CREAR">
    @endsection
