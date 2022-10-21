<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Devstagram - @yield('titulo') </title>
        @stack('styles')
        @vite('resources/css/app.css')
        @vite('resources/js/app.js')
        @livewireStyles

    </head>
    <body>
    
        <header class="header">
            <div class="contenedor header__barra">
                <a href="{{route('home')}}" class="header__heading">Devstagram</a> 

                @auth
                    <nav class="navegacion">
                        <a class="navegacion__enlace navegacion__enlace--crear" href="{{route('posts.create')}}"><svg class="camara" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path></svg> Crear</a>
                        <a class="navegacion__enlace" href="{{route('posts.index', auth()->user()->username)}}">Hola: <span class="navegacion__enlace--span">{{auth()->user()->username}}</span></a>
                        <form method="POST" action="{{route('logout')}}">
                            @csrf
                            <button type="submit" class="navegacion__enlace navegacion__enlace--boton" href="{{route('logout')}}">Cerrar Sesión</button>
                        </form>
                    </nav>
                @endauth

                @guest
                    <nav class="navegacion">
                        <a class="navegacion__enlace" href="{{route('login')}}">Login</a>
                        <a class="navegacion__enlace" href="{{route('register')}}">Crear Cuenta</a>
                    </nav>
                @endguest
                
            </div>
        </header>

        <main class="contenedor seccion main">
            <h2 class="main__heading">@yield('titulo')</h2>
            @yield('contenido')
        </main>

        <footer class="footer">
            <p class="footer__parrafo">Devstagram - Todos los derechos Reservados {{now()->year}} </p>
        </footer>
        @livewireScripts
    </body>
</html>
