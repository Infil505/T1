@extends('layouts.app')

@section('title', 'Lista de Libros')

@section('content')
    <h1>Libros registrados</h1>

    @if (session('success'))
        <div style="color: green;">
            {{ session('success') }}
        </div>
    @endif

    @auth
        @if (Auth::user()->is_admin)
            <a href="{{ route('book.create') }}">Agregar nuevo libro</a>
        @endif
    @endauth

    <ul>
        @forelse($libros as $libro)
            <li>
                <a href="{{ route('book.show', $libro->id) }}">
                    {{ $libro->title }} —
                    {{ $libro->autor->author ?? 'Sin autor' }},
                    {{ $libro->editorial->publisher ?? 'Sin editorial' }}
                </a>

                @auth
                    @if (Auth::user()->is_admin)
                        &nbsp;|&nbsp;
                        <a href="{{ route('book.edit', $libro->id) }}">Editar</a>

                        <form action="{{ route('book.destroy', $libro->id) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('¿Deseas eliminar este libro?')">
                                Eliminar
                            </button>
                        </form>
                    @endif
                @endauth
            </li>
        @empty
            <li>No hay libros registrados.</li>
        @endforelse
    </ul>
@endsection
