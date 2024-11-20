<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('acessorios_veiculos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('veiculo_id'); 
            $table->unsignedBigInteger('acessorio_id'); 
            $table->timestamps(); 

            // Definindo as chaves estrangeiras
            $table->foreign('veiculo_id')->references('id')->on('veiculos')->onDelete('cascade');
            $table->foreign('acessorio_id')->references('id')->on('acessorios')->onDelete('cascade');
            
            // Adicionando índices
            $table->index('veiculo_id');
            $table->index('acessorio_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('acessorios_veiculos');
    }
};