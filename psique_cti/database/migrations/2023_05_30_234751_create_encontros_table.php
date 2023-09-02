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
        Schema::create('encontros', function (Blueprint $table) {
            $table->id();
            $table->date('data');
            $table->string('aluno');
            $table->text('observacoes');
            $table->string('profissional');
            $table->foreign('profissional')->references('cpf')->on('profissionais')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('encontros');
    }
};
