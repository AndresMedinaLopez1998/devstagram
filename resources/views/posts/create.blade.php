@extends('layouts.app')

@section('titulo')
    Crea una Nueva Publicación
@endsection

@push('styles')
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush

@section('contenido')
    <div class="create">
        <div class="create__imagen">
            <form action="{{route('imagenes.store')}}" method="POST" enctype="multipart/form-data" id="dropzone" class="dropzone">
                @csrf
            </form>
        </div>

        <div class="create__contenido">
            <form action="{{route('posts.store')}}" method="POST" class="formulario" novalidate>
                @csrf
                <div class="formulario__campo">
                    <label for="titulo" class="formulario__label">Títilo:</label>
                    <input id="titulo" name="titulo" type="text" placeholder="Título de la Publicación" class="formulario__input @error('titulo') formulario__berror @enderror" value="{{old('titulo')}}"> 
                    @error('titulo')
                        <p class="formulario__error">{{$message}}</p>
                    @enderror
                </div>

                <div class="formulario__campo">
                    <label for="descripcion" class="formulario__label">Descripción:</label>
                    <textarea id="descripcion" name="descripcion" placeholder="Descripción de la Publicación" class="formulario__input @error('descripcion') formulario__berror @enderror" >{{old('titulo')}}</textarea>
                    @error('descripcion')
                        <p class="formulario__error">{{$message}}</p>
                    @enderror
                </div>

                <div class="formulario__hidden">
                    <input type="hidden" name="imagen" value="{{old('imagen')}}">
                    @error('imagen')
                        <p class="formulario__error">{{$message}}</p>
                    @enderror
                </div>

                <input type="submit" value="Publicar" class="formulario__submit">
            </form>
        </div>
    </div>
@endsection