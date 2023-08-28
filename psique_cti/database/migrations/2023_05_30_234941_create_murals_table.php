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
        Schema::create('murais', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('descricao');
            $table->string('profissional');
            $table->foreign('profissional')->references('cpf')->on('profissionais')->onDelete('cascade');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE murais ADD imagem BYTEA");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('murais');
    }
};
