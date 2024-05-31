<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    public function nodes()
    {
        return $this->belongsToMany(Node::class, 'node_services', 'service_id', 'node_id');
    }

    public function backgroundProcesses()
    {
        return $this->hasMany(BackgroundProcess::class);
    }
    
}
