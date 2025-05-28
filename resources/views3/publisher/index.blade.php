@extends('layouts.app')

@section('title', 'Editoriales')

@section('content')
    <style>
        .editorial-wrapper {
            max-width: 1000px;
            margin: 0 auto;
            padding: 40px 30px;
            background: linear-gradient(135deg, #ffffff 0%, #f0f8ff 100%);
            border-radius: 16px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.08);
            animation: fadeIn 1s ease-in-out;
        }

        .editorial-wrapper h1 {
            text-align: center;
            font-size: 2.5rem;
            color: #003366;
            margin-bottom: 30px;
            font-weight: 700;
            position: relative;
            animation: slideDown 0.8s ease-in-out;
        }

        .success-message {
            background-color: #d1f7e2;
            color: #116c44;
            padding: 15px 20px;
            border-left: 5px solid #2ecc71;
            border-radius: 10px;
            margin-bottom: 20px;
            font-weight: 600;
            animation: bounceIn 0.6s ease-in-out;
        }

        .btn-add {
            display: inline-block;
            background: linear-gradient(135deg, #00b09b, #96c93d);
            color: white;
            padding: 12px 24px;
            border-radius: 30px;
            text-decoration: none;
            font-weight: 600;
            margin-bottom: 25px;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            animation: floatIn 0.8s ease-in-out;
        }

        .btn-add:hover {
            background: linear-gradient(135deg, #009688, #7bb13c);
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }

        .publisher-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }
.publisher-title {
    font-size: 1.4rem;
    font-weight: 700;
    color: #004080;
    margin-bottom: 8px;
}

.publisher-title a {
    color: #004080;
    text-decoration: none;
    transition: color 0.3s ease;
}

.publisher-title a:hover {
    color: #1e40af;
    text-decoration: underline;
}

.publisher-meta {
    font-size: 0.95rem;
    color: #444;
    display: flex;
    gap: 15px;
    align-items: center;
    margin-bottom: 12px;
}

.publisher-meta i {
    color: #6b7280;
    margin-right: 5px;
}

.publisher-actions {
    display: flex;
    gap: 18px;
    margin-top: 10px;
}

.publisher-actions a,
.publisher-actions button {
    font-size: 0.95rem;
    font-weight: 500;
    text-decoration: none;
    color: #2563eb;
    background: none;
    border: none;
    cursor: pointer;
    transition: color 0.2s ease;
}

.publisher-actions .btn-delete {
    color: #dc2626;
}

.publisher-actions a:hover,
.publisher-actions button:hover {
    text-decoration: underline;
    color: #1d4ed8;
}


        .btn-delete {
            color: #e74c3c;
        }

        /* Animaciones */
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes slideDown {
            from { opacity: 0; transform: translateY(-30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes bounceIn {
            0% { transform: scale(0.9); opacity: 0; }
            50% { transform: scale(1.05); opacity: 1; }
            100% { transform: scale(1); }
        }

        @keyframes floatIn {
            from { transform: translateY(10px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }

        @keyframes riseUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>

    <div class="editorial-wrapper">
        <h1><i class="fas fa-building"></i> Editoriales registradas</h1>

        @if (session('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif

        @auth
            @if (Auth::user()->is_admin)
                <a href="{{ route('publisher.create') }}" class="btn-add">
                    <i class="fas fa-plus-circle"></i> Agregar nueva editorial
                </a>
            @endif
        @endauth

        <ul class="publisher-list">
            @forelse($editoriales as $index => $editorial)
                <li class="publisher-card" style="animation-delay: {{ 0.1 * $index }}s;">
                    <div class="publisher-title">
                        <i class="fas fa-bookmark"></i>
                        <a href="{{ route('publisher.show', $editorial->id) }}">
                            {{ $editorial->publisher }}
                        </a>
                    </div>
                    <div class="publisher-meta">
                        País: {{ $editorial->country }} | Fundada en {{ $editorial->founded }}
                    </div>

                    @auth
                        @if (Auth::user()->is_admin)
                            <div class="publisher-actions">
                                <a href="{{ route('publisher.edit', $editorial->id) }}">
                                    <i class="fas fa-edit"></i> Editar
                                </a>

                                <form action="{{ route('publisher.destroy', $editorial->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('¿Deseas eliminar esta editorial?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-delete">
                                        <i class="fas fa-trash-alt"></i> Eliminar
                                    </button>
                                </form>
                            </div>
                        @endif
                    @endauth
                </li>
            @empty
                <li class="publisher-card">
                    No hay editoriales registradas.
                </li>
            @endforelse
        </ul>
    </div>
@endsection
