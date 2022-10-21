@extends('layouts.app')

@section('titulo')
    Perfil: {{$user->username}}
@endsection 

@section('contenido')
    <div class="contenedor dashboard">

        <div class="dashboard__imagen">
            <img class="dashboard__img" src="{{ $user->imagen ? asset('perfiles') . '/' . $user->imagen : asset('img/usuario.svg') }}" alt="Imagen Usuario">
        </div>

        <div class="dashboard__contenido">

            <div class="dashboard__perfil">
                <p class="dashboard__usuario">{{$user->username}}</p>

                @auth
                    @if ($user->id === auth()->user()->id)
                        <a class="dashboard__pencil" href="{{route('perfil.index')}}"><svg class="camara" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg></a>
                    @endif
                @endauth

            </div>

            <p class="dashboard__items">{{ $user->followers->count() }} <span class="dashboard__span"> @choice('Seguidor|Seguidores', $user->followers->count()) </span></p>
            <p class="dashboard__items">{{ $user->followings->count() }} <span class="dashboard__span"> Siguiendo </span></p>
            <p class="dashboard__items">{{ $user->posts->count() }} <span class="dashboard__span">Posts</span></p>

            @auth
                @if ($user->id !== auth()->user()->id)
                    @if(!$user->siguiendo(auth()->user()))
                        <form class="dashboard__form" action="{{route('users.follow', $user)}}" method="POST">
                            @csrf
                            <input type="submit" class="dashboard__siguiendo" value="Seguir">
                        </form>
                    @else
                        <form class="dashboard__form" action="{{route('users.unfollow', $user)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit" class="dashboard__siguiendo dashboard__siguiendo--red" value="Dejar de Seguir">
                        </form>
                    @endif
                @endif
            @endauth
        </div>

    </div>

    <section class="publicaciones">
        <h2 class="publicaciones__heading">Publicaciones</h2>
        
        <x-listar-post :posts="$posts" />
    </section>
@endsection