<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
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
        'ra',
    ];

    public function aluno()
    {
        return $this->belongsTo(Aluno::class, 'ra', 'ra');
    }
}
