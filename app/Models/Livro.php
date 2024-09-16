<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livro extends Model // Corrigido para Livro com letra maiúscula
{
    use HasFactory;
    protected $table = 'livros'; 
    protected $fillable = ['titulo', 'autor', 'isbn', 'editora', 'ano', 'preco', 'quantidade', 'genero'];
}
