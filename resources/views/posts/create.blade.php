@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card p-4">
                <h2 class="mb-4 text-center">📘 Crear Nuevo Libro</h2>

                <form method="POST" action="{{ route('books.store') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="title" class="form-label">📖 Título</label>
                        <input type="text" name="title" class="form-control" placeholder="Ingrese el título del libro" required>
                    </div>

                    <div class="mb-3">
                        <label for="author" class="form-label">✍️ Autor</label>
                        <input type="text" name="author" class="form-control" placeholder="Ingrese el nombre del autor" required>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">📝 Descripción</label>
                        <textarea name="description" rows="4" class="form-control" placeholder="Escriba una breve descripción del libro..." required></textarea>
                    </div>

                    <div class="d-flex justify-content-between mt-4">
                        <a href="{{ route('books.index') }}" class="btn btn-info">⬅️ Volver</a>
                        <button type="submit" class="btn btn-primary">💾 Guardar Libro</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
