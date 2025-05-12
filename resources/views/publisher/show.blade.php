@extends('layouts.app')

@section('title', 'Detalles de la Editorial')

@section('content')
    <h1>{{ $editorial->publisher }}</h1>

    <p><strong>País:</strong> {{ $editorial->country }}</p>
    <p><strong>Año de fundación:</strong> {{ $editorial->founded }}</p>
    <p><strong>Especialidad:</strong> {{ $editorial->genere }}</p>

    @if ($editorial->libros && $editorial->libros->count())
        <h3>Libros publicados:</h3>
        <ul>
            @foreach ($editorial->libros as $libro)
                <li>
                    <a href="{{ route('book.show', $libro->id) }}">
                        {{ $libro->title }}
                    </a>
                </li>
            @endforeach
        </ul>
    @else
        <p>No hay libros registrados para esta editorial.</p>
    @endif

    <a href="{{ route('publisher') }}">← Volver a la lista</a>
@endsection
