@extends('layouts.app')

@section('titulo')
    {{$post->titulo}}
@endsection

@section('contenido')
    <div class="historia">
        <div class="historia__img">
            <img class="historia__imagen" src="{{asset('uploads/' . $post->imagen)}}" alt="Imagen del post {{$post->titulo}} ">

            <div>
                @auth
                    <livewire:like-post :post="$post" />
                @endauth
            </div>

            <div class="historia__agrupar">
                <p class="historia__elemento1">{{$post->user->username}}</p>
                <p class="historia__elemento2">{{$post->created_at->diffForHumans() }}</p>
                <p class="historia__elemento3">{{$post->descripcion}}</p>
            </div>

            @auth
                @if ($post->user_id === auth()->user()->id)
                    <form method="POST" action="{{route('posts.destroy', $post)}}">
                        @method('DELETE')
                        @csrf
                        <input class="formulario__eliminar" type="submit" value="Eliminar Publicación">
                    </form>
                @endif
            @endauth

        </div>

        <div class="historia__contenido">
            @auth
                <p class="historia__comentario">Agrega un Nuevo Comentario</p>

                @if(session('mensaje'))
                    <div class="historia__mensaje">
                        {{session('mensaje')}}
                    </div>
                @endif

                <form action="{{route('comentarios.store', ['post' => $post, 'user' => $user ])}}" method="POST">
                    @csrf
                    <div class="formulario__campo">
                        <label for="comentario" class="formulario__label">Comentario:</label>
                        <textarea id="comentario" name="comentario" placeholder="Agrega un comentario..." class="formulario__input @error('comentario') formulario__berror @enderror" ></textarea>
                        @error('comentario')
                            <p class="formulario__error">{{$message}}</p>
                        @enderror
                    </div>

                    <input type="submit" value="Comentar" class="formulario__submit">
                </form>
            @endauth

            <div class="comentarios">
                @if ($post->comentarios->count())
                    @foreach ($post->comentarios as $comentario)
                        <div class="comentario">
                            <a class="comentario__usuario" href="{{route('posts.index', $comentario->user)}}">{{$comentario->user->username}}</a>
                            <p class="comentario__parrafo">{{$comentario->comentario}}</p>
                            <p class="comentario__parrafo1">{{$comentario->created_at->diffForHumans()}}</p>
                        </div>
                    @endforeach
                @else
                    <p class="comentarios__no">No Hay Comentarios</p>
                @endif
            </div>
        </div>
    </div>
@endsection