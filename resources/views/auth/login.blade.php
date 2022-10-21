@extends('layouts.app')

@section('titulo')
    Inicia Sesión en Devstagram
@endsection

@section('contenido')
    <div class="register">
        <div class="register__imagen">
            <img src="{{asset('img/login.jpg')}}" alt="Imagen de Login">
        </div>

        <div class="formulario">
            <form method="POST" action="{{route('login')}}"  class="formulario" novalidate>
                @csrf

                @if(session('mensaje'))
                    <p class="formulario__error">{{session('mensaje')}}</p>                  
                @endif
               
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

                <div class="formulario__mantener">
                    <input type="checkbox" name="remember">
                    <label class="formulario__mantener--label">Mantener mi sesión abierta</label>
                </div>

                <input type="submit" value="Iniciar Sesión" class="formulario__submit">

            </form>
        </div>
    </div>
@endsection