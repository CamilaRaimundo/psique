<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profissional extends Model
{
<<<<<<< HEAD
    use HasFactory;
=======
    protected $table = 'profissionais';
    protected $fillable = [
        'crp',
        'telefone',
        'ativo',
        'cpf',
        'email',
        'nome'
    ];

    protected $primaryKey = 'cpf';
    public $incrementing = false;

    public function encontro(): HasMany
    {
        return $this->hasMany(Encontro::class, 'profissional', 'cpf');
    }

    public function mural(): HasMany
    {
        return $this->hasMany(Mural::class, 'profissional', 'cpf');
    }
>>>>>>> 0abc035deba6ff50b4d1bf1247348acb87912449
}
