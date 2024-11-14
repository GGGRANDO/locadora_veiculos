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
        Schema::create('veiculos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->decimal('valor_locacao', 10, 2);  // Usando decimal para valores monetários
            $table->boolean('seminovo');  // Alterando para booleano
            $table->boolean('ativo');  // Alterando para booleano
            $table->unsignedBigInteger('categoria_id');
            $table->timestamps();

            // Chaves estrangeiras
            $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('veiculos');
    }
};
