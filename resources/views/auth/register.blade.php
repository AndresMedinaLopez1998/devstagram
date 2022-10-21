@extends('layouts.app')

@section('titulo')
    Regístrate en Devstagram
@endsection

@section('contenido')
    <div class="register">
        <div class="register__imagen">
            <img src="{{asset('img/registrar.jpg')}}" alt="Imagen de Registro">
        </div>

        <div class="formulario">
            <form action="{{route('register')}}" method="POST" class="formulario" novalidate>
                @csrf
                <div class="formulario__campo">
                    <label for="name" class="formulario__label">Nombre:</label>
                    <input id="name" name="name" type="text" placeholder="Tu Nombre" class="formulario__input @error('name') formulario__berror @enderror" value="{{old('name')}}"> 
                    @error('name')
                        <p class="formulario__error">{{$message}}</p>
                    @enderror
                </div>

                <div class="formulario__campo">
                    <label for="username" class="formulario__label">UserName:</label>
                    <input id="username" name="username" type="text" placeholder="Tu Nombre de Usuario" class="formulario__input @error('name') formulario__berror @enderror" value="{{old('username')}}">
                    @error('username')
                        <p class="formulario__error">{{$message}}</p>
                    @enderror
                </div>

                <div class="formulario__campo">
                    <label for="email" class="formulario__label">Email:</label>
                    <input id="email" name="email" type="email" placeholder="Tu Correo" class="formulario__input @error('name') formulario__berror @enderror" value="{{old('email')}}">
                    @error('email')
                        <p class="formulario__error">{{$message}}</p>
                    @enderror
                </div>

                <div class="formulario__campo">
                    <label for="password" class="formulario__label">Password:</label>
                    <input id="password" name="password" type="password" placeholder="Passsword de Registro" class="formulario__input @error('name') formulario__berror @enderror" value="{{old('password')}}">
                    @error('password')
                        <p class="formulario__error">{{$message}}</p>
                    @enderror
                </div>

                <div class="formulario__campo">
                    <label for="password_confirmation" class="formulario__label">Repetir Password:</label>
                    <input id="password_confirmation" name="password_confirmation" type="password" placeholder="Repite tu Passsword" class="formulario__input">
                </div>

                <input type="submit" value="Crear Cuenta" class="formulario__submit">

            </form>
        </div>
    </div>
@endsection