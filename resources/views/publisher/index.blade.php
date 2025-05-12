@extends('layouts.app')

@section('title', 'Editoriales')

@section('content')
    <h1>Editoriales registradas</h1>

    @if (session('success'))
        <div style="color: green;">
            {{ session('success') }}
        </div>
    @endif

    @auth
        @if (Auth::user()->is_admin)
            <a href="{{ route('publisher.create') }}">Agregar nueva editorial</a>
        @endif
    @endauth

    <ul>
        @forelse($editoriales as $editorial)
            <li>
                <a href="{{ route('publisher.show', $editorial->id) }}">
                    {{ $editorial->publisher }} ({{ $editorial->country }}, fundada en {{ $editorial->founded }})
                </a>

                @auth
                    @if (Auth::user()->is_admin)
                        &nbsp;|&nbsp;
                        <a href="{{ route('publisher.edit', $editorial->id) }}">Editar</a>

                        <form action="{{ route('publisher.destroy', $editorial->id) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('¿Deseas eliminar esta editorial?')">
                                Eliminar
                            </button>
                        </form>
                    @endif
                @endauth
            </li>
        @empty
            <li>No hay editoriales registradas.</li>
        @endforelse
    </ul>
@endsection
