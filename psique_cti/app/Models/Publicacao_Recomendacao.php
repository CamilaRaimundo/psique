<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publicacao_Recomendacao extends Model
{
    protected $table = 'Publicacoes_Recomendacoes';
    protected $primaryKey = 'id_mural';
    protected $fillable = [
        'local',
        'data',
        'horario',
        'n_participantes',
        'id_mural'
    ];

    public function mural() : BelongsTo
    {
        return $this->belongsTo(Mural::class, 'id_mural', 'id');
    }
}
