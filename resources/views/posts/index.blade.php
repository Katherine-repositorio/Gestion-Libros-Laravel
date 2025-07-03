@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h2 class="mb-4 text-center">📚 Lista de Libros</h2>

            @forelse($books as $book)
                <div class="card mb-3 p-3">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <h5 class="mb-1">📖 {{ $book['title'] }}</h5>
                            <p class="mb-1 text-secondary">✍️ {{ $book['author'] }}</p>
                            <p class="text-muted mb-2">
                                {{ \Illuminate\Support\Str::limit($book['description'], 100, '...') }}
                            </p>
                            <a href="{{ route('books.show', $book['id']) }}" class="btn btn-sm btn-info">🔍 Ver más</a>
                        </div>

                        <div class="text-end">
                            <a href="{{ route('books.edit', $book['id']) }}" class="btn btn-sm btn-primary mb-1">✏️ Editar</a>

                            <form action="{{ route('books.destroy', $book['id']) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">🗑️ Eliminar</button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="alert alert-info text-center">
                    No hay libros registrados todavía.
                </div>
            @endforelse
        </div>
    </div>
@endsection
