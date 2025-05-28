<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title inertia>{{ config('app.name', 'Sistema de Biblioteca') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

    @vite('resources/js/app.js') 

    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }

        body { font-family: 'Inter', sans-serif; background: #f1f5f9; color: #1e293b; }

        nav {
            background: linear-gradient(to right, #0f172a, #2563eb);
            color: white;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        nav .left a,
        nav .right a {
            color: white;
            margin-right: 20px;
            text-decoration: none;
            font-weight: 500;
            transition: opacity 0.3s ease;
        }

        nav .left a:hover,
        nav .right a:hover { opacity: 0.85; }

        nav .right { display: flex; align-items: center; gap: 15px; }
        nav .right span { font-weight: 600; margin-right: 10px; }

        nav .right form { display: inline; }
        nav .right button {
            background: rgba(255, 255, 255, 0.15);
            border: 1px solid rgba(255, 255, 255, 0.3);
            color: white;
            cursor: pointer;
            font-size: 0.9em;
            padding: 6px 14px;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        nav .right button:hover { background: rgba(255, 255, 255, 0.25); }

        .container {
            max-width: 900px;
            margin: 40px auto;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.05);
            animation: fadeIn 0.5s ease;
        }

        @keyframes fadeIn { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }

        @media (max-width: 768px) {
            nav { flex-direction: column; align-items: flex-start; gap: 10px; }
            .container { margin: 20px; padding: 20px; }
        }
    </style>

    @inertiaHead
</head>
<body>
    <nav>
        <div class="left">
            <a href="/"><i class="fas fa-home"></i> Inicio</a>
            @auth
                <a href="/authors">Autores</a>
                <a href="/books">Libros</a>
                <a href="/publishers">Editoriales</a>
            @endauth
        </div>

        <div class="right">
            @auth
                <span><i class="fas fa-user"></i> {{ Auth::user()->name }}</span>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"><i class="fas fa-sign-out-alt"></i> Cerrar sesión</button>
                </form>
            @else
                <a href="/login"><i class="fas fa-sign-in-alt"></i> Iniciar sesión</a>
                <a href="/register"><i class="fas fa-user-plus"></i> Registrarse</a>
            @endauth
        </div>
    </nav>

    <div class="container">
        @inertia
    </div>

    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>
</html>
