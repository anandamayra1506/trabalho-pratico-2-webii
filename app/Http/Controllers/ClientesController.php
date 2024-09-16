<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    public function index()
    {
        $clientes = Cliente::all();
        return view('clientes.index', compact('clientes'));
    }

    public function create()
    {
        return view('clientes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string',
            'endereco' => 'required|string',
            'telefone' => 'required|string',
            'email' => 'required|email|unique:clientes,email',
            'cpf' => 'required|string|unique:clientes,cpf',
        ]);

        Cliente::create($request->all());

        return redirect()->route('clientes.index')->with('success', 'Cliente cadastrado com sucesso!');
    }

    public function edit($id)
    {
        // Encontrar o cliente pelo ID
        $cliente = Cliente::findOrFail($id);
        
        // Passar o cliente para a view de edição
        return view('clientes.edit', compact('cliente'));
    }
    

    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required|string',
            'endereco' => 'required|string',
            'telefone' => 'required|string',
            'email' => 'required|email|unique:clientes,email,' . $id,
            'cpf' => 'required|string|unique:clientes,cpf,' . $id,
        ]);

        $cliente = Cliente::findOrFail($id);
        $cliente->update($request->all());

        return redirect()->route('clientes.index')->with('success', 'Cliente atualizado com sucesso!');
    }

    public function destroy($id)
    {
        Cliente::findOrFail($id)->delete();
        return redirect()->route('clientes.index')->with('success', 'Cliente excluído com sucesso!');
    }
}
