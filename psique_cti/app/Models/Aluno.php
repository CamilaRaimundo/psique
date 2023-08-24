<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    protected $table = 'alunos';
    protected $fillable = [
        'ra',
        'curso',
        'nome',
        'data_nasc',
        'email',
    ];

    protected $primaryKey = 'ra';

    public $incrementing = false;

    public function historico_aluno() : HasOne
    {
        return $this->HasOne(Historico_aluno::class, 'aluno', 'ra');
    }
}
