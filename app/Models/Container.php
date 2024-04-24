<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Container extends Model
{
    use HasFactory;

    protected $fillable = [
        'container_id',
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

}
