@extends('layouts.app')

@section('content')
<style>
    /* Wrapper que ocupa toda la pantalla para centrar contenido */
    .page-wrapper {
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: flex-start; /* subir un poco */
    padding-top: 60px;       /* espacio desde arriba */
    padding-bottom: 20px;
    background: linear-gradient(135deg, #d7eafc 0%, #f4f9f9 100%);
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    margin: 0;
}

    /* Caja del formulario */
    .form-container {
        background: rgba(255, 255, 255, 0.9);
        padding: 35px 30px;
        border-radius: 20px;
        box-shadow: 0 4px 15px rgba(170, 185, 204, 0.3);
        width: 100%;
        max-width: 480px;
        animation: fadeIn 0.9s ease forwards;
    }

    h1 {
        text-align: center;
        margin-bottom: 28px;
        color: #506d84;
        font-weight: 600;
        animation: slideDown 0.6s ease forwards;
    }

    /* Inputs con bordes suaves y sombra al enfocar */
    .form-control {
        border-radius: 12px;
        border: 1.5px solid #cfd8e6;
        padding: 12px 14px;
        font-size: 1rem;
        transition: border-color 0.3s ease, box-shadow 0.3s ease;
    }

    .form-control:focus {
        border-color: #a3c4f3;
        box-shadow: 0 0 10px rgba(163, 196, 243, 0.4);
        outline: none;
    }

    /* Botón con degradado pastel */
    .btn-primary {
        background: linear-gradient(90deg, #a3c4f3 0%, #d7eafc 100%);
        border: none;
        border-radius: 14px;
        padding: 12px;
        font-weight: 600;
        color: #335d9f;
        width: 100%;
        transition: background 0.4s ease, transform 0.2s ease;
        box-shadow: 0 3px 8px rgba(163, 196, 243, 0.3);
    }

    .btn-primary:hover {
        background: linear-gradient(90deg, #d7eafc 0%, #a3c4f3 100%);
        transform: scale(1.04);
        box-shadow: 0 5px 12px rgba(163, 196, 243, 0.5);
        color: #1f3b70;
    }

    /* Animaciones suaves */
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(12px); }
        to { opacity: 1; transform: translateY(0); }
    }

    @keyframes slideDown {
        from { opacity: 0; transform: translateY(-18px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>

<div class="page-wrapper">
    <div class="form-container">
        <h1>Editar Libro</h1>
        <form method="POST" action="{{ route('books.update', $book['id']) }}">
            @csrf @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Título</label>
                <input type="text" name="title" class="form-control" value="{{ $book['title'] }}" required>
            </div>
            <div class="mb-3">
                <label for="author" class="form-label">Autor</label>
                <input type="text" name="author" class="form-control" value="{{ $book['author'] }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
</div>
@endsection
