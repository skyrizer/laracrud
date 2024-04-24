<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CpuUsage extends Model
{
    use HasFactory;

    protected $fillable = [
        'container_id',
        'percentage',
      

    ];

}
