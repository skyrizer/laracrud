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
        'node_id'
    ];

}
