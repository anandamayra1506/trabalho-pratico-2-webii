<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('fornecedores', function (Blueprint $table) {
            $table->id();
            $table->string('empresa');
            $table->string('vendedor');
            $table->string('cnpj')->unique(); // Adicionar restrição de unicidade para CNPJ
            $table->string('endereco');
            $table->string('telefone');
            $table->string('email')->unique(); // Adicionar restrição de unicidade para email
            $table->string('formapg');
            $table->date('data'); // Verifique se este campo está formatado corretamente para armazenar datas
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fornecedores');
    }
};
