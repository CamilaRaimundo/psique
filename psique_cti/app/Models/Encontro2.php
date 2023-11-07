<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Encontros extends Model
{
    protected $fillable = [
        'data',
        'aluno',
        'observacoes',
        'profissional'
    ];

    public function profissional(): BelongsTo
    {
        return $this->belongsTo(Profissional::class, 'profissional', 'cpf');
    }
}
