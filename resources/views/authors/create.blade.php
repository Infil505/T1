@extends('layouts.app')

@section('title', 'Agregar Autor')

@section('content')
    <h1>Agregar nuevo autor</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('authors.store') }}" method="POST">
        @csrf

        <div>
            <label for="author">Nombre del autor:</label>
            <input type="text" name="author" id="author" required>
        </div>

        <div>
            <label for="nationality">Nacionalidad:</label>
            <input type="text" name="nationality" id="nationality" required>
        </div>

        <div>
            <label for="birth_year">Año de nacimiento:</label>
            <input type="number" name="birth_year" id="birth_year" required>
        </div>

        <div>
            <label for="fields">Áreas de conocimiento:</label>
            <input type="text" name="fields" id="fields" required>
        </div>

        <button type="submit">Guardar autor</button>
    </form>
@endsection
