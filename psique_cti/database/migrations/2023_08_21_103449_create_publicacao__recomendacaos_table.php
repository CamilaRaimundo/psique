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
        Schema::create('publicacao__recomendacaos', function (Blueprint $table) {
            $table->string('local');
            $table->date('data');
            $table->time('horario');
            $table->integer('n_participantes');
            $table->foreign('id_mural')->references('id')->on('murais')->onDelete('cascade')->primary();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('publicacao__recomendacaos');
    }
};
