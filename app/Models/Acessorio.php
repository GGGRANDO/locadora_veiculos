<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Acessorio extends Model
{
    protected $table = 'acessorios'; 
    protected $fillable = ['nome', 'ativo'];

    public function veiculos()
    {
        return $this->belongsToMany(Veiculo::class, 'acessorios_veiculos', 'acessorio_id', 'veiculo_id');
    }
}