<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Página Principal</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
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
                nav {
                    display: flex;
                    flex-wrap: wrap;
                    justify-content: center;
                    gap: 1rem;
                    background-color: white;
                    padding: 1rem;
                    border-radius: 8px;
                    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                }
                nav a {
                    text-decoration: none;
                    color: #4a6cf7;
                    font-weight: 600;
                    padding: 0.5rem 1rem;
                    transition: color 0.3s ease;
                }
                nav a:hover {
                    color: #1e40af;
                }
            </style>
        @endif
    </head>
    <body>
        <header>
            <h1>Página Principal</h1>
        </header>
        <nav>
            <a href="{{ route('books.index') }}">Books</a>
            <a href="{{ route('authors.index') }}">Authors</a>
            <a href="{{ route('publishers.index') }}">Publishers</a>
            <a href="{{ route('contacts.create') }}">Agregar Contacto</a>
        </nav>
    </body>
</html>