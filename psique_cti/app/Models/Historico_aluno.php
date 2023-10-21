<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Historico_aluno extends Model
{
    protected $table = 'historico_alunos';

    protected $fillable = [
        'qtde_moradores',
        'tempo_sentimentos',
        'queixas',
        'acompanhamento',
        'medicamentos',
        'nome_medicamentos',
        'aluno',
    ];

    public function aluno(): BelongsTo
    {
        return $this->belongsTo(Aluno::class, 'aluno', 'ra');
    }
}
