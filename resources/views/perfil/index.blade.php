@extends('layouts.app')

@section('titulo')
    Editar Perfil: {{auth()->user()->username}}
@endsection

@section('contenido')
    <div class="px-5 lg:px-5 lg:flex lg:justify-center">
        <div class="lg:w-1/2">
            <form method="POST" class="mt-10 lg:mt-0" action="{{route('perfil.store')}}" enctype="multipart/form-data" >
                @csrf
                <div class="mb-5">
                    <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">Username: </label>
                    <input type="text" id="username" name="username" placeholder="Tu Nombre de Usuario" class="border p-3 w-full rounded-lg @error('username') border-red-500 @enderror" value="{{auth()->user()->username}}">
                    @error('username')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center ">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="imagen" class="mb-2 block uppercase text-gray-500 font-bold">Imagen Perfil: </label>
                    <input type="file" id="imagen" name="imagen"  class="border p-3 w-full rounded-lg"  value="" accept=".jpg, .jpeg, .png, .gif">
                </div>

                <input type="submit" value="Guardar" class="bg-sky-600 hover:bg-sky-800 transition-colors cursor-pointer uppercase font-bold p-3 w-full text-white rounded-lg ">
            </form>
        </div>
    </div>
@endsection