@extends('layouts.app')

@section('title', 'Detalles del Autor')

@section('content')
    <h1>{{ $autor->author }}</h1>

    <p><strong>Nacionalidad:</strong> {{ $autor->nationality }}</p>
    <p><strong>Año de nacimiento:</strong> {{ $autor->birth_year }}</p>
    <p><strong>Áreas de conocimiento:</strong> {{ $autor->fields }}</p>

    @if ($autor->libros && count($autor->libros))
        <h3>Libros relacionados:</h3>
        <ul>
            @foreach ($autor->libros as $libro)
                <li>
                    <a href="{{ route('book.show', $libro->id) }}">
                        {{ $libro->title }}
                    </a>
                </li>
            @endforeach
        </ul>
    @else
        <p>Este autor no tiene libros registrados.</p>
    @endif

    <a href="{{ route('authors') }}">← Volver a la lista</a>
@endsection
