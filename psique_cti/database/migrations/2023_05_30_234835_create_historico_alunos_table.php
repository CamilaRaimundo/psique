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
        Schema::create('historico_alunos', function (Blueprint $table) {
            $table->id();
            $table->integer('qtde_moradores');
            $table->string('tempo_sentimentos');
            $table->string('queixas');
            $table->boolean('acompanhamento');
            $table->boolean('medicamentos');
            $table->string('nome_medicamentos');
            $table->string('aluno');
            $table->foreign('aluno')->references('ra')->on('alunos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historico_alunos');
    }
};
