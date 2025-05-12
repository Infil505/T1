@extends('layouts.app')

@section('title', 'Detalles del Libro')

@section('content')
    <h1>{{ $libro->title }}</h1>

    <p><strong>Edición:</strong> {{ $libro->edition }}</p>
    <p><strong>Año de copyright:</strong> {{ $libro->copyright }}</p>
    <p><strong>Idioma:</strong> {{ $libro->language }}</p>
    <p><strong>Páginas:</strong> {{ $libro->pages }}</p>

    <p><strong>Autor:</strong>
        @if ($libro->autor)
            <a href="{{ route('authors.show', $libro->autor->id) }}">
                {{ $libro->autor->author }}
            </a>
        @else
            No asignado
        @endif
    </p>

    <p><strong>Editorial:</strong>
        @if ($libro->editorial)
            <a href="{{ route('publisher.show', $libro->editorial->id) }}">
                {{ $libro->editorial->publisher }}
            </a>
        @else
            No asignada
        @endif
    </p>

    <a href="{{ route('book') }}">← Volver a la lista</a>
@endsection
