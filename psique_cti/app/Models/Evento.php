<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $table = 'eventos';
    public $incrementing = false;
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'titulo',
        'descricao',
        'profissional',
        'imagem',
        'local_evento',
        'dataehora_evento',
        'limite_pessoas_evento',
        'link_evento',
        'responsavel_evento',
    ];
}
