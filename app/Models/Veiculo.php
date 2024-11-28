<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Veiculo extends Model
{
    protected $table = 'veiculos';

    protected $fillable = [
        'nome', 
        'valor_locacao', 
        'seminovo', 
        'locacao', 
        'ativo', 
        'categoria_id', 
        'imagem', // A imagem agora é uma string, contendo apenas o nome do arquivo
    ];

    protected $casts = [
        'imagem' => 'string', // A imagem será tratada como string (nome do arquivo)
    ];

    // Relacionamento com acessórios
    public function acessorios()
    {
        return $this->belongsToMany(
            Acessorio::class, 
            'acessorios_veiculos', 
            'veiculo_id', 
            'acessorio_id'
        );
    }

    // Relacionamento com categoria
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }

    // Método para recuperar a URL da imagem (opcional, mas útil)
    public function getImagemUrlAttribute()
    {
        // Retorna a URL completa para a imagem armazenada
        return asset('storage/images/' . $this->imagem);
    }
}