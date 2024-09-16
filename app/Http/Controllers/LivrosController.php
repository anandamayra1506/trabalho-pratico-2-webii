<?php

namespace App\Http\Controllers;

use App\Models\Livro;
use Illuminate\Http\Request;

class LivrosController extends Controller
{
    /**
     * Exibir a lista de livros.
     */
    public function index()
    {
        $livros = Livro::all();
        return view('livros.index', compact('livros'));
    }

    /**
     * Mostrar o formulário para criar um novo livro.
     */
    public function create()
    {
        return view('livros.index', [
            'livros' => Livro::all(),
            'livro' => null
    ]);
    }

    /**
     * Armazenar um novo livro no banco de dados.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'titulo' => 'required|string|max:255',
            'autor' => 'required|string|max:255',
            'isbn' => 'required|string|max:13|unique:livros,isbn',
            'editora' => 'required|string|max:255',
            'ano' => 'required|date',
            'preco' => 'required|numeric',
            'quantidade' => 'required|integer',
            'genero' => 'required|string|max:255',
        ]);

        Livro::create($validatedData);
        return redirect()->route('livros.index')->with('success', 'Livro cadastrado com sucesso!');
    }

    /**
     * Mostrar o formulário para editar um livro existente.
     */
    public function edit($id)
    {
        $livro = Livro::findOrFail($id);
        $livros = Livro::all(); // Para listar os livros na mesma view
        return view('livros.index', compact('livro', 'livros'));
    }

    /**
     * Atualizar os dados de um livro.
     */
    public function update(Request $request, $id)
    {
        $livro = Livro::findOrFail($id);

        $validatedData = $request->validate([
            'titulo' => 'required|string|max:255',
            'autor' => 'required|string|max:255',
            'isbn' => 'required|string|max:13|unique:livros,isbn,'.$livro->id,
            'editora' => 'required|string|max:255',
            'ano' => 'required|date',
            'preco' => 'required|numeric',
            'quantidade' => 'required|integer',
            'genero' => 'required|string|max:255',
        ]);

        $livro->update($validatedData);
        return redirect()->route('livros.index')->with('success', 'Livro atualizado com sucesso!');
    }

    /**
     * Remover um livro do banco de dados.
     */
    public function destroy($id)
    {
        $livro = Livro::findOrFail($id);
        $livro->delete();
        return redirect()->route('livros.index')->with('success', 'Livro excluído com sucesso!');
    }
}
