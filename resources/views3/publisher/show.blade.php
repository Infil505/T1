@extends('layouts.app')

@section('title', 'Detalles de la Editorial')

@section('content')
    <style>
        .detail-container {
            background: linear-gradient(135deg, #ffffff, #f4faff);
            padding: 30px 40px;
            border-radius: 16px;
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.07);
            animation: fadeIn 0.6s ease-in-out;
        }

        .detail-container h1 {
            font-size: 2.2rem;
            color: #003366;
            font-weight: 700;
            margin-bottom: 25px;
            border-bottom: 2px solid #4a90e2;
            padding-bottom: 10px;
        }

        .detail-container p {
            font-size: 1rem;
            color: #444;
            margin-bottom: 15px;
            line-height: 1.6;
        }

        .detail-container p strong {
            color: #003366;
        }

        .detail-container a {
            color: #2563eb;
            font-weight: 500;
            text-decoration: none;
        }

        .detail-container a:hover {
            text-decoration: underline;
            color: #1d4ed8;
        }

        .detail-container ul {
            margin-top: 10px;
            margin-left: 20px;
            padding-left: 0;
        }

        .detail-container ul li {
            margin-bottom: 8px;
        }

        .detail-container h3 {
            font-size: 1.3rem;
            color: #0f172a;
            margin-top: 25px;
            margin-bottom: 10px;
        }

        .back-link {
            display: inline-block;
            margin-top: 30px;
            color: #0066cc;
            font-weight: 600;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .back-link:hover {
            color: #004080;
            text-decoration: underline;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>

    <div class="detail-container">
        <h1>{{ $editorial->publisher }}</h1>

        <p><strong>País:</strong> {{ $editorial->country }}</p>
        <p><strong>Año de fundación:</strong> {{ $editorial->founded }}</p>
        <p><strong>Especialidad:</strong> {{ $editorial->genere }}</p>

        @if ($editorial->libros && $editorial->libros->count())
            <h3><i class="fas fa-book"></i> Libros publicados:</h3>
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

        <a href="{{ route('publisher') }}" class="back-link">← Volver a la lista</a>
    </div>
@endsection
