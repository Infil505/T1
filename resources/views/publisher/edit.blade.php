@extends('layouts.app')

@section('title', 'Editar Editorial')

@section('content')
    <h1>Editar editorial: {{ $editorial->publisher }}</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('publisher.update', $editorial->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="publisher">Nombre de la editorial:</label>
            <input type="text" name="publisher" id="publisher" value="{{ old('publisher', $editorial->publisher) }}" required>
        </div>

        <div>
            <label for="country">País:</label>
            <input type="text" name="country" id="country" value="{{ old('country', $editorial->country) }}" required>
        </div>

        <div>
            <label for="founded">Año de fundación:</label>
            <input type="number" name="founded" id="founded" value="{{ old('founded', $editorial->founded) }}" required>
        </div>

        <div>
            <label for="genere">Especialidad:</label>
            <input type="text" name="genere" id="genere" value="{{ old('genere', $editorial->genere) }}" required>
        </div>

        <button type="submit">Actualizar editorial</button>
    </form>

    <br>
    <a href="{{ route('publisher') }}">← Volver</a>
@endsection

