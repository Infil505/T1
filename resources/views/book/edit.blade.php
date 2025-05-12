@extends('layouts.app')

@section('title', 'Editar Libro')

@section('content')
    <h1>Editar libro: {{ $libro->title }}</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('book.update', $libro->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="title">Título:</label>
            <input type="text" name="title" id="title" value="{{ old('title', $libro->title) }}" required>
        </div>

        <div>
            <label for="edition">Edición:</label>
            <input type="text" name="edition" id="edition" value="{{ old('edition', $libro->edition) }}" required>
        </div>

        <div>
            <label for="copyright">Año de copyright:</label>
            <input type="number" name="copyright" id="copyright" value="{{ old('copyright', $libro->copyright) }}" required>
        </div>

        <div>
            <label for="language">Idioma:</label>
            <input type="text" name="language" id="language" value="{{ old('language', $libro->language) }}" required>
        </div>

        <div>
            <label for="pages">Cantidad de páginas:</label>
            <input type="number" name="pages" id="pages" value="{{ old('pages', $libro->pages) }}" required>
        </div>

        <div>
            <label for="author_id">Autor:</label>
            <select name="author_id" id="author_id" required>
                @foreach ($autores as $autor)
                    <option value="{{ $autor->id }}" {{ $autor->id == old('author_id', $libro->author_id) ? 'selected' : '' }}>
                        {{ $autor->author }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="publisher_id">Editorial:</label>
            <select name="publisher_id" id="publisher_id" required>
                @foreach ($editoriales as $editorial)
                    <option value="{{ $editorial->id }}" {{ $editorial->id == old('publisher_id', $libro->publisher_id) ? 'selected' : '' }}>
                        {{ $editorial->publisher }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit">Actualizar libro</button>
    </form>

    <br>
    <a href="{{ route('book') }}">← Volver</a>
@endsection
