<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ isset($livro) ? 'Editar Livro' : 'Cadastrar Livro' }}
        </h2>
    </x-slot>

    <div class="container mx-auto py-8 max-w-4xl">
        <h1 class="text-2xl mb-6 text-center">{{ isset($livro) ? 'Editar Livro' : 'Cadastrar Livro' }}</h1>

        <!-- Formulário para Cadastrar/Editar Livro -->
        <form action="{{ isset($livro) ? route('livros.update', $livro->id) : route('livros.store') }}" method="POST" class="bg-white p-6 rounded shadow-md mx-auto max-w-xl">
            @csrf
            @if(isset($livro))
                @method('PUT')
            @endif

            <div class="mb-4">
                <label for="titulo" class="block text-gray-700">Título</label>
                <input type="text" name="titulo" class="w-full px-4 py-2 border rounded-md" value="{{ old('titulo', $livro->titulo ?? '') }}" required>
            </div>

            <div class="mb-4">
                <label for="autor" class="block text-gray-700">Autor</label>
                <input type="text" name="autor" class="w-full px-4 py-2 border rounded-md" value="{{ old('autor', $livro->autor ?? '') }}" required>
            </div>

            <div class="mb-4">
                <label for="isbn" class="block text-gray-700">ISBN</label>
                <input type="text" name="isbn" class="w-full px-4 py-2 border rounded-md" value="{{ old('isbn', $livro->isbn ?? '') }}" required>
            </div>

            <div class="mb-4">
                <label for="editora" class="block text-gray-700">Editora</label>
                <input type="text" name="editora" class="w-full px-4 py-2 border rounded-md" value="{{ old('editora', $livro->editora ?? '') }}" required>
            </div>

            <div class="mb-4">
                <label for="ano" class="block text-gray-700">Ano</label>
                <input type="date" name="ano" class="w-full px-4 py-2 border rounded-md" value="{{ old('ano', $livro->ano ?? '') }}" required>
            </div>

            <div class="mb-4">
                <label for="preco" class="block text-gray-700">Preço</label>
                <input type="text" name="preco" class="w-full px-4 py-2 border rounded-md" value="{{ old('preco', $livro->preco ?? '') }}" required>
            </div>

            <div class="mb-4">
                <label for="quantidade" class="block text-gray-700">Quantidade</label>
                <input type="number" name="quantidade" class="w-full px-4 py-2 border rounded-md" value="{{ old('quantidade', $livro->quantidade ?? '') }}" required>
            </div>

            <div class="mb-4">
                <label for="genero" class="block text-gray-700">Gênero</label>
                <input type="text" name="genero" class="w-full px-4 py-2 border rounded-md" value="{{ old('genero', $livro->genero ?? '') }}" required>
            </div>

            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md">{{ isset($livro) ? 'Atualizar' : 'Cadastrar' }}</button>
        </form>

        <!-- Listagem de Livros -->
        <h2 class="text-2xl mt-8 text-center">Lista de Livros</h2>
        <table class="w-full mt-4 table-auto mx-auto max-w-4xl bg-white shadow-md rounded">
            <thead>
                <tr class="bg-gray-200">
                    <th class="px-4 py-2">Título</th>
                    <th class="px-4 py-2">Autor</th>
                    <th class="px-4 py-2">ISBN</th>
                    <th class="px-4 py-2">Editora</th>
                    <th class="px-4 py-2">Ano</th>
                    <th class="px-4 py-2">Preço</th>
                    <th class="px-4 py-2">Quantidade</th>
                    <th class="px-4 py-2">Gênero</th>
                    <th class="px-4 py-2">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($livros as $livro)
                <tr class="bg-white">
                    <td class="border px-4 py-2">{{ $livro->titulo }}</td>
                    <td class="border px-4 py-2">{{ $livro->autor }}</td>
                    <td class="border px-4 py-2">{{ $livro->isbn }}</td>
                    <td class="border px-4 py-2">{{ $livro->editora }}</td>
                    <td class="border px-4 py-2">{{ $livro->ano }}</td>
                    <td class="border px-4 py-2">{{ $livro->preco }}</td>
                    <td class="border px-4 py-2">{{ $livro->quantidade }}</td>
                    <td class="border px-4 py-2">{{ $livro->genero }}</td>
                    <td class="border px-4 py-2">
                        <a href="{{ route('livros.edit', $livro->id) }}" class="inline-block bg-blue-500 text-white px-2 py-1 rounded-md">Editar</a>
                        <form action="{{ route('livros.destroy', $livro->id) }}" method="POST" style="display:inline-block;">
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
