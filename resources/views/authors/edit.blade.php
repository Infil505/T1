@extends('layouts.app')

@section('title', 'Editar Autor')

@section('content')
    <h1>Editar autor: {{ $autor->author }}</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('authors.update', $autor->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="author">Nombre:</label>
            <input type="text" name="author" id="author" value="{{ old('author', $autor->author) }}" required>
        </div>

        <div>
            <label for="nationality">Nacionalidad:</label>
            <input type="text" name="nationality" id="nationality" value="{{ old('nationality', $autor->nationality) }}" required>
        </div>

        <div>
            <label for="birth_year">Año de nacimiento:</label>
            <input type="number" name="birth_year" id="birth_year" value="{{ old('birth_year', $autor->birth_year) }}" required>
        </div>

        <div>
            <label for="fields">Áreas de conocimiento:</label>
            <input type="text" name="fields" id="fields" value="{{ old('fields', $autor->fields) }}" required>
        </div>

        <button type="submit">Actualizar autor</button>
    </form>

    <br>
    <a href="{{ route('authors') }}">← Volver</a>
@endsection
