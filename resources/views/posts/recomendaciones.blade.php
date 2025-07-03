@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h1 class="text-primary">📌 Recomendaciones de Lectura</h1>
    <p class="lead">Estos libros son altamente recomendados por nuestra biblioteca.</p>

    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        @foreach($recomendados as $libro)
            <div class="col">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">{{ $libro['title'] }}</h5>
                        <h6 class="card-subtitle text-muted mb-2">{{ $libro['author'] }}</h6>
                        <p class="card-text">{{ $libro['description'] }}</p>
                        <a href="{{ route('books.show', $libro['id']) }}" class="btn btn-primary btn-sm">Ver Detalles</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
