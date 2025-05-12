@extends('layouts.app')

@section('title', 'Inicio')

@section('content')
    <h1>Bienvenido al Sistema de Biblioteca</h1>

    @auth
        <p>Hola, {{ Auth::user()->name }}.</p>
        <p>Desde aquí puedes acceder a:</p>
        <ul>
            <li><a href="{{ route('authors') }}">Autores</a></li>
            <li><a href="{{ route('book') }}">Libros</a></li>
            <li><a href="{{ route('publisher') }}">Editoriales</a></li>
        </ul>
    @else
        <p>Este sistema permite gestionar libros, autores y editoriales.</p>
        <p><a href="{{ route('login') }}">Inicia sesión</a> para comenzar.</p>
    @endauth
@endsection
