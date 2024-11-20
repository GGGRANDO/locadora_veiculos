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
        // Verifica se a tabela já existe
        if (!Schema::hasTable('veiculos')) {
            Schema::create('veiculos', function (Blueprint $table) {
                $table->id();
                $table->string('nome');
                $table->decimal('valor_locacao', 10, 2); 
                $table->string('seminovo'); 
                $table->string('locacao'); 
                $table->string('ativo'); 
                $table->unsignedBigInteger('categoria_id');
                $table->timestamps();

                // Chave estrangeira
                $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('cascade');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('veiculos');
    }
};