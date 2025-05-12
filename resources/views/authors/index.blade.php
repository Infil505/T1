@extends('layouts.app')

@section('title', 'Lista de Autores')

@section('content')
    <h1>Autores registrados</h1>

    @if (session('success'))
        <div style="color: green;">
            {{ session('success') }}
        </div>
    @endif

    @auth
        @if (Auth::user()->is_admin)
            <a href="{{ route('authors.create') }}">Agregar nuevo autor</a>
        @endif
    @endauth

    <ul>
        @forelse($autores as $autor)
            <li>
                <a href="{{ route('authors.show', $autor->id) }}">
                    {{ $autor->author }} ({{ $autor->nationality }}, {{ $autor->birth_year }})
                </a>

                @auth
                    @if (Auth::user()->is_admin)
                        &nbsp;|&nbsp;
                        <a href="{{ route('authors.edit', $autor->id) }}">Editar</a>

                        <form action="{{ route('authors.destroy', $autor->id) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('¿Deseas eliminar este autor?')">
                                Eliminar
                            </button>
                        </form>
                    @endif
                @endauth
            </li>
        @empty
            <li>No hay autores registrados.</li>
        @endforelse
    </ul>
@endsection
