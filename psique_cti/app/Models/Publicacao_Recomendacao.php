s<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publicacao_Recomendacao extends Model
{
    protected $table = "publicacoes_recomendacoes";
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $fillable = [
        'titulo',
        'descricao',
        'autor',
        'imagem',
        'profissional',
        'link',
        'autor',
    ];

    public function Profissional() : BelongsTo
    {
        return $this->belongsTo(Profissional::class, 'profissional', 'cpf');
    }
}
