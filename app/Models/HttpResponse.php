<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HttpResponse extends Model
{
    use HasFactory;

    protected $fillable = [
        'url',
        'status_code',
        'node_id',
    ];

}
