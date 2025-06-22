<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/botones', function () {
    return view('botones');
});

Route::get('/posts', function () {
    return view('posts.index');
})->name('posts.index'); // ← ¡ESTO es lo que faltaba!

Route::get('/posts/{id}', function ($id) {
    return view('posts.show', ['id' => $id]); // Detalle de post
})->name('posts.show');