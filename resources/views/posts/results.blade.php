{{-- resources/views/posts/results.blade.php --}}
@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h2 text-primary">Resultados de Búsqueda para: <span class="fw-bold">"{{ $query }}"</span></h1>
            <a href="{{ route('books.index') }}" class="btn btn-info btn-lg shadow-sm">
                <i class="fas fa-home me-2"></i> Volver al Inicio
            </a>
        </div>

        @if($books->isEmpty())
            {{-- Sección para CUANDO NO HAY RESULTADOS: Color y tamaño ajustados --}}
            <div class="alert alert-info text-center py-3 my-4 rounded-lg shadow-sm no-results-card" role="alert">
                <h4 class="alert-heading mb-2">¡Lo sentimos!</h4>
                <p class="mb-0">No se encontraron libros que coincidan con tu búsqueda.</p>
                <p class="mb-0 text-muted small">Intenta con otro término o verifica la ortografía.</p>
            </div>
        @else
            {{-- Sección para CUANDO SÍ HAY RESULTADOS: Centrado de tarjetas y texto --}}
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 justify-content-center"> {{-- Añadido justify-content-center aquí --}}
                @foreach($books as $book)
                    <div class="col d-flex justify-content-center"> {{-- Añadido d-flex justify-content-center para centrar cada tarjeta --}}
                        <div class="card h-100 shadow-sm border-0 animated-card text-center"> {{-- Añadido text-center para centrar el texto dentro de la tarjeta --}}
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title text-truncate mb-2" title="{{ $book['title'] }}">
                                    <i class="bi bi-book-fill me-2 text-info"></i>{{ $book['title'] }}
                                </h5>
                                <h6 class="card-subtitle mb-2 text-muted">
                                    <i class="bi bi-person-fill me-1"></i>{{ $book['author'] }}
                                </h6>
                                <p class="card-text text-secondary mb-3 flex-grow-1">
                                    {{ Str::limit($book['description'], 120, '...') }}
                                </p>
                                <div class="mt-auto">
                                    <a href="{{ route('books.show', $book['id']) }}" class="btn btn-primary btn-sm w-100">
                                        Ver Detalles
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection

@section('styles')
    {{-- Estilos específicos para esta vista --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        /* Tus estilos generales existentes */
        .text-primary { color: #007bff !important; }
        .text-info { color: #17a2b8 !important; }
        .btn-info {
            background: linear-gradient(to right, #17a2b8, #63cdda) !important;
            border: none !important;
        }

        /* --- ESTILOS MEJORADOS PARA LAS TARJETAS DE RESULTADOS --- */
        .card {
            background-color: #ffffff; /* Blanco puro */
            border-radius: 16px;
            border: none;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08); /* Sombra suave */
            transition: all 0.3s ease-in-out;
            max-width: 300px; /* Limita el ancho de la tarjeta para que se vea bien centrada en una sola columna */
            margin: auto; /* Centra la tarjeta horizontalmente dentro de su columna */
        }

        .animated-card:hover {
            transform: translateY(-5px) scale(1.02);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15) !important;
        }

        .card-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: #333;
        }
        .card-subtitle {
            font-size: 0.9rem;
            color: #666 !important;
        }
        .card-text {
            font-size: 0.95rem;
            line-height: 1.5;
            color: #555;
        }
        .text-truncate {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        /* --- ESTILOS PARA LA ALERTA "NO HAY RESULTADOS" --- */
        .alert-info { /* Usamos alert-info de Bootstrap para un color azul suave por defecto */
            background-color: #d1ecf1; /* Fondo azul claro */
            border-color: #bee5eb;
            color: #0c5460;
        }
        /* Clase personalizada para el tamaño y color del card de "No hay resultados" */
        .no-results-card {
            max-width: 450px; /* Más pequeño que el 100% de ancho */
            margin-left: auto; /* Centra horizontalmente */
            margin-right: auto; /* Centra horizontalmente */
            background-color: #e3f2fd; /* Un azul claro muy sutil, como tu fondo de body pero un poco más sólido */
            border: 1px solid #90caf9; /* Un borde suave del mismo tono */
            box-shadow: 0 2px 8px rgba(0,0,0,0.05); /* Sombra muy sutil */
        }
        .no-results-card .alert-heading {
            color: #2196f3; /* Un azul más vibrante para el título */
        }
        .no-results-card hr {
            border-top: 1px solid rgba(0,0,0,.1); /* Línea divisoria */
        }

        /* Ajustes para dispositivos móviles */
        @media (max-width: 575.98px) {
            .no-results-card {
                max-width: 90%; /* En móviles, se adapta al 90% del ancho */
            }
        }
    </style>
@endsection