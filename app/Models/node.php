<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Node extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'hostname',
        'ip_address',
    ];

    public function services()
    {
        return $this->belongsToMany(Service::class, 'node_services', 'node_id', 'service_id');
    }
}
