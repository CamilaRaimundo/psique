<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mural extends Model
{
    protected $table = 'murais';
    protected $fillable = [
        'titulo',
        'descricao',
        'autor',
        'imagem',
        'cpf'
    ];

    public function profissional() : BelongsTo
    {
        return $this->belongsTo(Profissional::class, 'cpf', 'cpf');
    }

    public function Publicacao_Recomendacao() : HasMany
    {
        return $this->hasOne(Publicacao_Recomendacao::class, 'id_mural', 'id');
    }

    public function Evento() : HasMany
    {
        return $this->hasOne(Publicacao_Recomendacao::class, 'id_mural', 'id');
    }
}
