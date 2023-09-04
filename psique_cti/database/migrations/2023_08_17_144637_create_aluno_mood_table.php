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
        Schema::create('aluno_mood', function (Blueprint $table) {
            $table->date('data');
            $table->string('aluno');
            $table->string('mood');
            $table->foreign('aluno')->references('ra')->on('alunos')->onDelete('cascade');
            $table->foreign('mood')->references('emocao')->on('moods')->onDelete('cascade');
            $table->primary(['aluno', 'data', 'mood']);
            $table->timestamps();

            //DB::statement("ALTER TABLE aluno_mood ADD CONSTRAINT aluno_mood_new_pkey PRIMARY KEY (data, aluno, mood);");

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aluno_mood');
    }
};
