<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
    private $books = [
        [
            'id' => 1,
            'title' => '1984',
            'author' => 'George Orwell',
            'description' => 'Una novela distópica sobre una sociedad totalitaria.',
            'views' => 150
        ],
        [
            'id' => 2,
            'title' => 'Cien Años de Soledad',
            'author' => 'Gabriel García Márquez',
            'description' => 'La historia de varias generaciones de la familia Buendía en Macondo.',
            'views' => 230
        ],
        [
            'id' => 3,
            'title' => 'Don Quijote de la Mancha',
            'author' => 'Miguel de Cervantes',
            'description' => 'Un hidalgo enloquecido que cree ser caballero andante.',
            'views' => 180
        ]
    ];

    public function index()
    {
        return view('posts.index', ['books' => $this->books]);
    }

    public function show($id)
    {
        $book = collect($this->books)->firstWhere('id', $id);

        if (!$book) {
            abort(404, 'Libro no encontrado');
        }

        return view('posts.show', compact('book'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        // Simulación de creación
        return redirect()->route('books.index')->with('success', 'Libro creado (simulado)');
    }

    public function edit($id)
    {
        $book = collect($this->books)->firstWhere('id', $id);

        if (!$book) {
            abort(404, 'Libro no encontrado');
        }

        return view('posts.edit', compact('book'));
    }

    public function update(Request $request, $id)
    {
        // Simulación de actualización
        return redirect()->route('books.index')->with('success', 'Libro actualizado (simulado)');
    }

    public function destroy($id)
    {
        // Simulación de eliminación
        return redirect()->route('books.index')->with('success', 'Libro eliminado (simulado)');
    }

    public function search(Request $request)
    {
        $query = strtolower($request->input('query'));

        $filteredBooks = collect($this->books)->filter(function ($book) use ($query) {
            return str_contains(strtolower($book['title']), $query) ||
                   str_contains(strtolower($book['author']), $query) ||
                   str_contains(strtolower($book['description']), $query);
        })->values();

        $books = $filteredBooks;

        return view('posts.results', compact('books', 'query'));
    }

    public function recomendaciones()
{
    // Lista de libros recomendados 
    $recomendados = [
        [
            'id' => 1,
            'title' => '1984',
            'author' => 'George Orwell',
            'description' => 'Una novela distópica sobre una sociedad totalitaria.'
        ],
        [
            'id' => 2,
            'title' => 'Cien años de soledad',
            'author' => 'Gabriel García Márquez',
            'description' => 'Una obra maestra del realismo mágico.'
        ],
    ];

    return view('posts.recomendaciones', compact('recomendados'));
}

}
