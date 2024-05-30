<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NodeService extends Model
{
    use HasFactory;

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function node()
    {
        return $this->belongsTo(Node::class);
    }

}
