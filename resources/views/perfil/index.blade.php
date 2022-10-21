@extends('layouts.app')

@section('titulo')
    Editar Perfil: {{ auth()->user()->username }}
@endsection

@section('contenido')
<div class="formulario max">
    <form action="{{route('perfil.store')}}" enctype="multipart/form-data" method="POST" class="formulario" novalidate>
        @csrf
        <div class="formulario__campo">
            <label for="username" class="formulario__label">Username:</label>
            <input id="username" name="username" type="text" placeholder="Tu Nombre de Usuario" class="formulario__input @error('username') formulario__berror @enderror" value="{{auth()->user()->username}}"> 
            @error('username')
                <p class="formulario__error">{{$message}}</p>
            @enderror
        </div>

        <div class="formulario__campo">
            <label for="imagen" class="formulario__label">Imagen Perfil:</label>
            <input id="imagen" name="imagen" type="file" accept=" jpg jpeg png"  class="formulario__input"> 
        </div>

        <input type="submit" value="Guardar Cambios" class="formulario__submit">
    </form>
@endsection