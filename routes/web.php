<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

// Ruta por defecto: listado de libros
Route::get('/', [BookController::class, 'index'])->name('books.index');

// Mostrar formulario para crear un libro
Route::get('/books/create', [BookController::class, 'create'])->name('books.create');

// Guardar nuevo libro (simulado)
Route::post('/books', [BookController::class, 'store'])->name('books.store');

// Mostrar detalles de un libro (título, autor, descripción)
Route::get('/books/{id}', [BookController::class, 'show'])->name('books.show');

// Mostrar formulario para editar un libro
Route::get('/books/{id}/edit', [BookController::class, 'edit'])->name('books.edit');

// Actualizar libro (simulado)
Route::put('/books/{id}', [BookController::class, 'update'])->name('books.update');

// Eliminar libro (simulado)
Route::delete('/books/{id}', [BookController::class, 'destroy'])->name('books.destroy');

// PARA LA BÚSQUEDA!
Route::get('/search', [BookController::class, 'search'])->name('search.books');

//para libros recomendados

Route::get('/recomendaciones', [BookController::class, 'recomendaciones'])->name('recomendaciones.index');


