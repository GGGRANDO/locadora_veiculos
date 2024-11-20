<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Veiculo extends Model
{
    protected $table = 'veiculos';

    protected $fillable = ['nome', 'valor_locacao', 'seminovo','locacao','ativo', 'categoria_id'];

    public function acessorios()
    {
        return $this->belongsToMany(Acessorio::class, 'acessorios_veiculos', 'veiculo_id', 'acessorio_id');
    }

    public function imagens()
    {
        return $this->belongsToMany(Imagem::class, 'imagens', 'veiculo_id');
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }
}