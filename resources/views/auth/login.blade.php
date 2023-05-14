@extends('layouts.app')

@section('titulo')
    Inicia Sesión en Devstagram
@endsection

@section('contenido')
    <div class="lg:flex lg:justify-center lg:gap-6 lg:items-center">
        <div class="lg:w-6/12 p-5">
            <img src="{{asset('img/login.jpg')}}" alt="Imagen de Login de Usuarios">
        </div>

        <div class="lg:w-4/12 bg-white rounded-lg shadow-xl p-6">
            <form action="{{route('login')}}" method="POST">
                @csrf

                @if (session('mensaje'))
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center ">{{session('mensaje')}}</p>
                @endif

                <div class="mb-5">
                    <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">Email: </label>
                    <input type="email" id="email" name="email" placeholder="Tu Email de registro" class="border p-3 w-full rounded-lg @error('email') border-red-500 @enderror" value="{{old('email')}}">
                    @error('email')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center ">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">Password: </label>
                    <input type="password" id="password" name="password" placeholder="Tu Password de registro" class="border p-3 w-full rounded-lg @error('password') border-red-500 @enderror">
                    @error('password')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center ">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <input type="checkbox" name="remember" id="recuerdame"> 
                    <label for="recuerdame" class="text-gray-500 text-sm">Mantener mi sesión abierta</label>
                </div>

                <input type="submit" value="Iniciar Sesión" class="bg-sky-600 hover:bg-sky-800 transition-colors cursor-pointer uppercase font-bold p-3 w-full text-white rounded-lg ">
            </form>
        </div>
    </div>
@endsection