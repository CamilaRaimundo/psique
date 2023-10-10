<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $table = 'eventos';
    protected $fillable = [
        'titulo',
        'descricao',
        'autor',
        'imagem',
        'profissional',
        'local_evento',
        'dataehora_evento',
        'limite_pessoas_evento',
        'link_evento',
        'responsavel_evento',
    ];

    public function Profissional() : BelongsTo
    {
        return $this->belongsTo(Profissional::class, 'profissional', 'cpf');
    }
}
