<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sessions extends Model
{
    // use HasFactory;
    protected $table = 'sessions';

    protected $fillable = [
        'id',
        'user_id',
        'ip_address ',
        'user_agent ',
        'payload',
        'last_activity',
    ];

    public function aluno()
    {
        return $this->belongsTo(Aluno::class, 'ra', 'ra');
          Session::flush();
    }
}
