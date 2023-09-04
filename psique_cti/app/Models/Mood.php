<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mood extends Model
{
    protected $table = 'moods';
    
    protected $primaryKey = 'emocoes';

    public $incrementing = false;

    protected $fillable = [
        'emocoes',
    ];
}
