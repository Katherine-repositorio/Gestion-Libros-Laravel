@extends('layouts.app')

@section('content')
    <h1>{{ $book['title'] }}</h1>
    <h5 class="text-muted">Autor: {{ $book['author'] }}</h5>

    <div class="mt-3">
        <h4>Descripción:</h4>
        <p>{{ $book['description'] }}</p>
    </div>

    <a href="{{ route('books.index') }}" class="btn btn-secondary mt-3">⬅️ Volver al listado</a>
@endsection
