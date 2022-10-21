<div>
    @if ($posts->count())
        <div class="publicacion">
            @foreach ($posts as $post)
                    <a href="{{route('posts.show',['post' => $post, 'user' => $post->user ])}}" class="publicacion__enlace">
                        <img class="publicacion__img" src="{{ asset('uploads') . '/' . $post->imagen }}" alt="Imagen del Post {{$post->titulo}} "> 
                    </a>
            @endforeach
        </div>

        <div>
            {{$posts->links('pagination::default')}}
        </div>
    @else 
        <p class="home__parrafo">No hay posts, sigue a alguien para poder mostrar sus posts</p>
    @endif
</div>