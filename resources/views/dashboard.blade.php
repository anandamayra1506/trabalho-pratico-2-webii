<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div> -->

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-4">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold mb-4">Gestão de Vendas Livraria São João</h3>
                    <a href="{{ route('vendas.index') }}" class="btn btn-primary bg-blue-500 text-white px-4 py-2 rounded-lg">
                        Ir para a tela de vendas
                    </a>
                    <a href="{{ route('clientes.index') }}" class="btn btn-primary bg-blue-500 text-white px-4 py-2 rounded-lg">
                        Ir para a tela de Clientes
                    </a>
                    <a href="{{ route('livros.index') }}" class="btn btn-primary bg-blue-500 text-white px-4 py-2 rounded-lg">
                        Ir para a tela de Livros
                    </a> 
                    <a href="{{ route('fornecedores.index') }}" class="btn btn-primary bg-blue-500 text-white px-4 py-2 rounded-lg">
                        Ir para a tela de Fornecedores
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
