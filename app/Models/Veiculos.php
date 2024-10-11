<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Veiculos extends Model
{
    protected $table = 'veiculos';
    protected $fillable = ['nome','locacao','seminovo','ativo'];
}
