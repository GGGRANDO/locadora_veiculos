<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Veiculo extends Model
{
    protected $table = 'veiculos';

    protected $fillable = ['nome', 'locacao', 'seminovo', 'ativo', 'categoria_id'];

    public function acessorios()
    {
        return $this->belongsToMany(Acessorio::class, 'acessorios_veiculo');
    }
}

