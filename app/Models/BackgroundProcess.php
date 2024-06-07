<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BackgroundProcess extends Model
{
    use HasFactory;

        // Define the relationship with Service
        public function service()
        {
            return $this->belongsTo(Service::class);
        }

              /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'service_id',
    ];
}
