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
        Schema::create('eventos', function (Blueprint $table) {
            $table->string('local_evento');
            $table->dateTime('dataehora_evento');
            $table->integer('limite_pessoas_evento');
            $table->string('link_evento');
            $table->binary('img_ilustrativa');
            $table->string('responsavel_evento');
            $table->id('id_mural');
            $table->foreign('id_mural')->references('id')->on('murais')->onDelete('cascade')->primary();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eventos');
    }
};
