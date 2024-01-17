@extends('layouts.template')
@section('titulo', 'Editar Animal')
@section('contenido')
    <h1 class="text-3xl font-bold underline">Pagina para editar el animal {{ $animal }}</h1>
    <form action="{{ route() }}"method="POST" enctype="multipart/form-data" class="formulario">
        <input type="text" name="especie" id="especie" value="{{ $animal['especie'] }}">
        <input type="text" name="peso" id="peso" value="{{ $animal['peso'] }}">
        <input type="text" name="altura" id="altura" value="{{ $animal['altura'] }}">
        <input type="text" name="fecha" id="fecha" value="{{ $animal['fecha'] }}">
        <input type="text" name="dieta" id="dieta" value="{{ $animal['alimentacion'] }}">
        <input type="text" name="descripcion" id="descripcion" value="{{ $animal['descripcion'] }}">
        <input type="file" name="imagen" id="imagen" value="{{ $animal['imagen'] }}">
        <img src="{{ asset('assets/imagenes/' . $animal['imagen']) }}" alt="{{ $animal['especie'] }}">
        <input type="submit" name="enviar" id="enviar" value="CREAR">
    @endsection
