<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    public $incrementing = false;
    protected $fillable = [
        'link',
        'id_mural'
    ];
    protected $primaryKey = 'id_mural';

    public function mural(): BelongsTo
    {
        return $this->belongsTo(Mural::class, 'id_mural', 'id');
    }
}
