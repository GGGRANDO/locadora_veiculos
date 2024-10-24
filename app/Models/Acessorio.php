<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Acessorio extends Model
{
    protected $table = 'acessorios'; // Corrigido para uma string
    protected $fillable = ['nome', 'ativo'];

    // Se a chave primária não for "id", você pode definir assim:
    // protected $primaryKey = 'sua_chave_primaria';
}