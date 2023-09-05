<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mural extends Model
{
<<<<<<< HEAD
    use HasFactory;
=======
    protected $table = 'murais';
    protected $fillable = [
        'titulo',
        'descricao',
        'autor',
        'imagem',
        'cpf'
    ];

    public function Profissional() : BelongsTo
    {
        return $this->belongsTo(Profissional::class, 'cpf', 'cpf');
    }

    public function Publicacao_Recomendacao() : HasOne
    {
        return $this->hasOne(Publicacao_Recomendacao::class, 'id_mural', 'id');
    }

    public function Evento() : HasOne
    {
        return $this->hasOne(Evento::class, 'id_mural', 'id');
    }
>>>>>>> 0abc035deba6ff50b4d1bf1247348acb87912449
}
