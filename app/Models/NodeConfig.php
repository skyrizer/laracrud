<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NodeConfig extends Model
{
    use HasFactory;

    protected $primaryKey = ['config_id', 'node_id'];
    public $incrementing = false; // Since composite keys are not auto-incrementing

    public function config()
    {
        return $this->belongsTo(Config::class);
    }

    public function node()
    {
        return $this->belongsTo(Node::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'config_id',
        'node_id',
        'value'
    ];



}
