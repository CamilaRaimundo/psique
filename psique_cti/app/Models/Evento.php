<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $table = 'eventos';
    protected $primaryKey = 'id';
    protected $fillable = [
        'local_evento',
        'dataehora_evento',
        'limite_pessoas_evento',
        'link_evento',
        'img_ilustrativa',
        'responsavel_evento',
      
    ];

   
}
