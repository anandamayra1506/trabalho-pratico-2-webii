<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ isset($fornecedor) ? 'Editar Fornecedor' : 'Cadastrar Fornecedor' }}
        </h2>
    </x-slot>

    <div class="container py-8 mx-auto max-w-4xl">
        <!-- Formulário para Cadastrar/Editar Fornecedor -->
        <h1 class="text-2xl mb-6 text-center">{{ isset($fornecedor) ? 'Editar Fornecedor' : 'Cadastrar Fornecedor' }}</h1>

        <form action="{{ isset($fornecedor) ? route('fornecedores.update', $fornecedor->id) : route('fornecedores.store') }}" method="POST" class="mx-auto max-w-xl">
            @csrf
            @if(isset($fornecedor))
                @method('PUT')
            @endif

            <div class="mb-4">
                <label for="empresa" class="block text-gray-700">Empresa</label>
                <input type="text" name="empresa" class="w-full px-4 py-2 border rounded-md" value="{{ old('empresa', $fornecedor->empresa ?? '') }}" required>
            </div>

            <div class="mb-4">
                <label for="vendedor" class="block text-gray-700">Vendedor</label>
                <input type="text" name="vendedor" class="w-full px-4 py-2 border rounded-md" value="{{ old('vendedor', $fornecedor->vendedor ?? '') }}" required>
            </div>

            <div class="mb-4">
                <label for="cnpj" class="block text-gray-700">CNPJ</label>
                <input type="text" name="cnpj" class="w-full px-4 py-2 border rounded-md" value="{{ old('cnpj', $fornecedor->cnpj ?? '') }}" required>
            </div>

            <div class="mb-4">
                <label for="endereco" class="block text-gray-700">Endereço</label>
                <input type="text" name="endereco" class="w-full px-4 py-2 border rounded-md" value="{{ old('endereco', $fornecedor->endereco ?? '') }}" required>
            </div>

            <div class="mb-4">
                <label for="telefone" class="block text-gray-700">Telefone</label>
                <input type="text" name="telefone" class="w-full px-4 py-2 border rounded-md" value="{{ old('telefone', $fornecedor->telefone ?? '') }}">
            </div>

            <div class="mb-4">
                <label for="email" class="block text-gray-700">Email</label>
                <input type="email" name="email" class="w-full px-4 py-2 border rounded-md" value="{{ old('email', $fornecedor->email ?? '') }}" required>
            </div>

            <div class="mb-4">
                <label for="formapg" class="block text-gray-700">Forma de Pagamento</label>
                <input type="text" name="formapg" class="w-full px-4 py-2 border rounded-md" value="{{ old('formapg', $fornecedor->formapg ?? '') }}">
            </div>

            <div class="mb-4">
                <label for="data" class="block text-gray-700">Data</label>
                <input type="date" name="data" class="w-full px-4 py-2 border rounded-md" value="{{ old('data', $fornecedor->data ?? '') }}" required>
            </div>

            <button type="submit" class="inline-block bg-blue-500 text-white px-4 py-2 rounded-md">{{ isset($fornecedor) ? 'Atualizar' : 'Cadastrar' }}</button>
        </form>

        <!-- Listagem de Fornecedores -->
        <h2 class="text-2xl mt-8 text-center">Lista de Fornecedores</h2>
        <table class="w-full mt-4 table-auto mx-auto max-w-4xl">
            <thead>
                <tr class="bg-gray-200">
                    <th class="px-4 py-2">Empresa</th>
                    <th class="px-4 py-2">Vendedor</th>
                    <th class="px-4 py-2">CNPJ</th>
                    <th class="px-4 py-2">Email</th>
                    <th class="px-4 py-2">Telefone</th>
                    <th class="px-4 py-2">Endereço</th>
                    <th class="px-4 py-2">Forma PG</th>
                    <th class="px-4 py-2">Data Cadastro</th>
                    <th class="px-4 py-2">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($fornecedores as $fornecedor)
                <tr class="bg-white">
                    <td class="border px-4 py-2">{{ $fornecedor->empresa }}</td>
                    <td class="border px-4 py-2">{{ $fornecedor->vendedor }}</td>
                    <td class="border px-4 py-2">{{ $fornecedor->cnpj }}</td>
                    <td class="border px-4 py-2">{{ $fornecedor->email }}</td>
                    <td class="border px-4 py-2">{{ $fornecedor->telefone }}</td>
                    <td class="border px-4 py-2">{{ $fornecedor->endereco }}</td>
                    <td class="border px-4 py-2">{{ $fornecedor->formapg }}</td>
                    <td class="border px-4 py-2">{{ $fornecedor->data }}</td>
                    <td class="border px-4 py-2">
                        <a href="{{ route('fornecedores.edit', $fornecedor->id) }}" class="inline-block bg-blue-500 text-white px-2 py-1 rounded-md">Editar</a>
                        <form action="{{ route('fornecedores.destroy', $fornecedor->id) }}" method="POST" style="display:inline-block;">
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
