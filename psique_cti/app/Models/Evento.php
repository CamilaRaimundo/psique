<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publicacao_Recomendacao extends Model
{
    protected $table = 'Publicacoes_Recomendacoes';
    protected $primaryKey = 'id_mural';
    protected $fillable = [
        'local_evento',
        'dataehora_evento',
        'limite_pessoas_evento',
        'link_evento',
        'img_ilustrativa',
        'responsavel_evento',
        'id_mural'
    ];

    public function mural() : BelongsTo
    {
        return $this->belongsTo(Mural::class, 'id_mural', 'id');
    }
}
