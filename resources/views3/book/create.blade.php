@extends('layouts.app')

@section('title', 'Agregar Libro')

@section('content')
    <h1>Agregar nuevo libro</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('book.store') }}" method="POST">
        @csrf

        <div>
            <label for="title">Título:</label>
            <input type="text" name="title" id="title" value="{{ old('title') }}" required>
        </div>

        <div>
            <label for="edition">Edición:</label>
            <input type="text" name="edition" id="edition" value="{{ old('edition') }}" required>
        </div>

        <div>
            <label for="copyright">Año de copyright:</label>
            <input type="number" name="copyright" id="copyright" value="{{ old('copyright') }}" required>
        </div>

        <div>
            <label for="language">Idioma:</label>
            <input type="text" name="language" id="language" value="{{ old('language') }}" required>
        </div>

        <div>
            <label for="pages">Cantidad de páginas:</label>
            <input type="number" name="pages" id="pages" value="{{ old('pages') }}" required>
        </div>

        <div>
            <label for="author_id">Autor:</label>
            <select name="author_id" id="author_id" required>
                <option value="">-- Selecciona un autor --</option>
                @foreach ($autores as $autor)
                    <option value="{{ $autor->id }}" {{ old('author_id') == $autor->id ? 'selected' : '' }}>
                        {{ $autor->author }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="publisher_id">Editorial:</label>
            <select name="publisher_id" id="publisher_id" required>
                <option value="">-- Selecciona una editorial --</option>
                @foreach ($editoriales as $editorial)
                    <option value="{{ $editorial->id }}" {{ old('publisher_id') == $editorial->id ? 'selected' : '' }}>
                        {{ $editorial->publisher }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit">Guardar libro</button>
    </form>
@endsection
