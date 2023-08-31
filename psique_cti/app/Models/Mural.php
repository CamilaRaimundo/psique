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
        return $this->hasMany(Publicacao_Recomendacao::class, 'id_mural', 'id');
    }

    public function Evento() : HasMany
    {
          return $this->hasMany(Evento::class); //Publicacao_Recomendacao::class, 'id_mural', 'id');
    }
    // class Mural extends Model { protected $fillable = ['conteudo']; public function eventos() { return $this->hasMany(Evento::class); } }
}
