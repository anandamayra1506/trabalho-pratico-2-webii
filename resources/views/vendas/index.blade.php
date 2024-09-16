<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ isset($venda) ? 'Editar Venda' : 'Cadastrar Venda' }}
        </h2>
    </x-slot>

    <div class="container mx-auto py-8 max-w-4xl">
        <h1 class="text-2xl mb-6 text-center">{{ isset($venda) ? 'Editar Venda' : 'Cadastrar Venda' }}</h1>

        <!-- Formulário para Cadastrar/Editar Venda -->
        <form action="{{ isset($venda) ? route('vendas.update', $venda->id) : route('vendas.store') }}" method="POST" class="bg-white p-6 rounded shadow-md mx-auto max-w-xl">
            @csrf
            @if(isset($venda))
                @method('PUT')
            @endif

            <div class="mb-4">
                <label for="livro_id" class="block text-gray-700">Livro</label>
                <select name="livro_id" class="w-full px-4 py-2 border rounded-md" required>
                    @foreach($livros as $livro)
                        <option value="{{ $livro->id }}" {{ (isset($venda) && $venda->livro_id == $livro->id) ? 'selected' : '' }}>
                            {{ $livro->titulo }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="cliente_nome" class="block text-gray-700">Nome do Cliente</label>
                <input type="text" name="cliente_nome" class="w-full px-4 py-2 border rounded-md" value="{{ old('cliente_nome', $venda->cliente_nome ?? '') }}" required>
            </div>

            <div class="mb-4">
                <label for="quantidade" class="block text-gray-700">Quantidade</label>
                <input type="number" name="quantidade" class="w-full px-4 py-2 border rounded-md" value="{{ old('quantidade', $venda->quantidade ?? '') }}" required>
            </div>

            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md">{{ isset($venda) ? 'Atualizar' : 'Cadastrar' }}</button>
        </form>

        <!-- Listagem de Vendas -->
        <h2 class="text-2xl mt-8 text-center">Lista de Vendas</h2>
        <table class="w-full mt-4 table-auto mx-auto max-w-4xl bg-white shadow-md rounded">
            <thead>
                <tr class="bg-gray-200">
                    <th class="px-4 py-2">Livro</th>
                    <th class="px-4 py-2">Cliente</th>
                    <th class="px-4 py-2">Quantidade</th>
                    <th class="px-4 py-2">Preço Total</th>
                    <th class="px-4 py-2">Status</th>
                    <th class="px-4 py-2">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($vendas as $venda)
                <tr class="bg-white">
                    <td class="border px-4 py-2">{{ $venda->livro->titulo }}</td>
                    <td class="border px-4 py-2">{{ $venda->cliente_nome }}</td>
                    <td class="border px-4 py-2">{{ $venda->quantidade }}</td>
                    <td class="border px-4 py-2">{{ $venda->preco_total }}</td>
                    <td class="border px-4 py-2">{{ $venda->status ?? 'Ativa' }}</td>
                    <td class="border px-4 py-2">
                        <a href="{{ route('vendas.edit', $venda->id) }}" class="inline-block bg-yellow-500 text-white px-2 py-1 rounded-md">Editar</a>
                        <form action="{{ route('vendas.destroy', $venda->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button class="bg-red-500 text-white px-2 py-1 rounded-md" type="submit">Excluir</button>
                        </form>
                        <form action="{{ route('vendas.cancel', $venda->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('PATCH')
                            <button class="bg-blue-500 text-white px-2 py-1 rounded-md" type="submit">Cancelar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
