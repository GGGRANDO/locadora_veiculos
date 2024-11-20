<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLocacaoToVeiculosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Adicionando a coluna 'locacao' na tabela 'veiculos'
        Schema::table('veiculos', function (Blueprint $table) {
            $table->string('locacao')->nullable(); // A coluna será uma string e pode ser nula
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Caso a migration seja revertida, a coluna será removida
        Schema::table('veiculos', function (Blueprint $table) {
            $table->dropColumn('locacao');
        });
    }
}