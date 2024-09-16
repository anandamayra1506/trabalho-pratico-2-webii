<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Gerenciar Clientes
        </h2>
    </x-slot>

    <div class="container mx-auto py-8 max-w-4xl">
        <!-- Formulário para Cadastrar Cliente -->
        <h1 class="text-2xl mb-6 text-center">Cadastrar Novo Cliente</h1>
        <form action="{{ route('clientes.store') }}" method="POST" class="bg-white p-6 rounded shadow-md mx-auto">
            @csrf

            <div class="mb-4">
                <label for="nome" class="block text-gray-700">Nome</label>
                <input type="text" name="nome" class="w-full px-4 py-2 border rounded-md" value="{{ old('nome') }}" required>
            </div>

            <div class="mb-4">
                <label for="endereco" class="block text-gray-700">Endereço</label>
                <input type="text" name="endereco" class="w-full px-4 py-2 border rounded-md" value="{{ old('endereco') }}" required>
            </div>

            <div class="mb-4">
                <label for="telefone" class="block text-gray-700">Telefone</label>
                <input type="text" name="telefone" class="w-full px-4 py-2 border rounded-md" value="{{ old('telefone') }}" required>
            </div>

            <div class="mb-4">
                <label for="email" class="block text-gray-700">E-mail</label>
                <input type="email" name="email" class="w-full px-4 py-2 border rounded-md" value="{{ old('email') }}" required>
            </div>

            <div class="mb-4">
                <label for="cpf" class="block text-gray-700">CPF</label>
                <input type="text" name="cpf" class="w-full px-4 py-2 border rounded-md" value="{{ old('cpf') }}" required>
            </div>

            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md">Cadastrar</button>
        </form>

        <!-- Listagem de Clientes -->
        <h2 class="text-2xl mt-8 text-center">Lista de Clientes</h2>
        <table class="w-full mt-4 table-auto bg-white shadow-md rounded mx-auto max-w-4xl">
            <thead>
                <tr class="bg-gray-200">
                    <th class="px-4 py-2">Nome</th>
                    <th class="px-4 py-2">Endereço</th>
                    <th class="px-4 py-2">Telefone</th>
                    <th class="px-4 py-2">E-mail</th>
                    <th class="px-4 py-2">CPF</th>
                    <th class="px-4 py-2">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($clientes as $cliente)
                <tr class="bg-white">
                    <td class="border px-4 py-2">{{ $cliente->nome }}</td>
                    <td class="border px-4 py-2">{{ $cliente->endereco }}</td>
                    <td class="border px-4 py-2">{{ $cliente->telefone }}</td>
                    <td class="border px-4 py-2">{{ $cliente->email }}</td>
                    <td class="border px-4 py-2">{{ $cliente->cpf }}</td>
                    <td class="border px-4 py-2">
                        <a href="{{ route('clientes.edit', $cliente->id) }}" class="inline-block bg-blue-500 text-white px-2 py-1 rounded-md">Editar</a>
                        <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button class="bg-red-500 text-white px-2 py-1 rounded-md" type="submit">Excluir</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
