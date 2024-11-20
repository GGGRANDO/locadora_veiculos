<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('imagens', function (Blueprint $table) {
            $table->string('imagem');  // Adiciona uma coluna 'imagem' do tipo string
        });
    }
    
    public function down()
    {
        Schema::table('imagens', function (Blueprint $table) {
            $table->dropColumn('imagem');  // Remove a coluna 'imagem' caso a migration seja revertida
        });
    }
};