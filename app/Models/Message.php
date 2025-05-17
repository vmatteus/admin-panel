<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'from',
        'type',
        'content',
        'timestamp',
        'sender',
        'isGroup',
        'fromMe'
    ];

    protected $casts = [
        'timestamp' => 'datetime',
        'isGroup' => 'boolean',
        'fromMe' => 'boolean'
    ];
}
