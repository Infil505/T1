@extends('layouts.app')

@section('title', 'Agregar Editorial')

@section('content')
    <h1>Agregar nueva editorial</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('publisher.store') }}" method="POST">
        @csrf

        <div>
            <label for="publisher">Nombre de la editorial:</label>
            <input type="text" name="publisher" id="publisher" value="{{ old('publisher') }}" required>
        </div>

        <div>
            <label for="country">País:</label>
            <input type="text" name="country" id="country" value="{{ old('country') }}" required>
        </div>

        <div>
            <label for="founded">Año de fundación:</label>
            <input type="number" name="founded" id="founded" value="{{ old('founded') }}" required>
        </div>

        <div>
            <label for="genere">Especialidad:</label>
            <input type="text" name="genere" id="genere" value="{{ old('genere') }}" required>
        </div>

        <button type="submit">Guardar editorial</button>
    </form>
@endsection
