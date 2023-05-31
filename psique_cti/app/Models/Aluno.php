<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    protected $table = 'alunos';
    protected $fillable = [
        'curso',
        'nome',
        'data_nasc',
        'email',
    ];
}
