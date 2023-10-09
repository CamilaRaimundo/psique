<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publicacao_Recomendacao extends Model
{
    protected $table = 'publicacoes_recomendacoes';
    public $incrementing = false;
    protected $fillable = [
        'id',
        'titulo',
        'descricao',
        'profissional',
        'imagem',
        'link',
        'autor',
    ];
    protected $primaryKey = 'id';

 }
