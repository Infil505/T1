<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Sistema de Biblioteca')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; background: #f4f4f4; }
        nav { background: #004080; color: white; padding: 10px 20px; display: flex; justify-content: space-between; align-items: center; }
        nav .left a, nav .right a { color: white; margin-right: 15px; text-decoration: none; }
        nav .right form { display: inline; }
        nav .right button { background: none; border: none; color: white; cursor: pointer; font-size: 1em; }
        .container { max-width: 800px; margin: 20px auto; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
    </style>
</head>
<body>

    <nav>
        <div class="left">
            <a href="{{ route('home') }}">Inicio</a>

            @auth
                <a href="{{ route('authors') }}">Autores</a>
                <a href="{{ route('book') }}">Libros</a>
                <a href="{{ route('publisher') }}">Editoriales</a>
            @endauth
        </div>

        <div class="right">
            @auth
                <span>{{ Auth::user()->name }}</span>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit">Cerrar sesión</button>
                </form>
            @else
                <a href="{{ route('login') }}">Iniciar sesión</a>
                <a href="{{ route('register') }}">Registrarse</a>
            @endauth
        </div>
    </nav>

    <div class="container">
        @yield('content')
    </div>

</body>
</html>
