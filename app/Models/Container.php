<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Container extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'image',
        'created',
        'status',
        'port',
        'disk_limit',
        'net_limit',
        'mem_limit',
        'node_id'
    ];

    // Specify that the 'id' field is a string
    protected $keyType = 'string';

    // Explicitly cast the 'id' field to a string
    protected $casts = [
        'id' => 'string',
    ];
}
