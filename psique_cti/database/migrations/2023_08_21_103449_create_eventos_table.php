//artigos migration
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
            $table->id();
            $table->string('titulo');
            $table->string('descricao');
            $table->string('profissional');
            $table->binary('imagem')->nullable();
            $table->foreign('profissional')->references('cpf')->on('profissionais')->onDelete('cascade');
            $table->string('local_evento');
            $table->dateTime('dataehora_evento');
            $table->integer('limite_pessoas_evento');
            $table->string('link_evento')->nullable();
            $table->string('responsavel_evento');
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
