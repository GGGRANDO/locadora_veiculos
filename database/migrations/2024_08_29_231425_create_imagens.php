<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('imagens', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('veiculo_id');
            $table->timestamps();

            $table->foreign('veiculo_id')->references('id')->on('veiculos');
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('imagens');
    }
};