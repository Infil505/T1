<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Página Principal')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Estilos Inline (Para fallback si no se compilan los estilos) -->
    <style>
        body {
            font-family: 'Instrument Sans', sans-serif;
            background-color: #f8f9fa;
            color: #1b1b18;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            padding: 2rem;
        }
        header {
            width: 100%;
            max-width: 900px;
            text-align: center;
            margin-bottom: 2rem;
        }
        .container {
            width: 100%;
            max-width: 900px;
            margin: 0 auto;
            padding: 1rem;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <header>
        <h1>@yield('title', 'Página Principal')</h1>
    </header>

    <x-navbar />

    <div class="container">
        @yield('content')
    </div>

</body>
</html>
