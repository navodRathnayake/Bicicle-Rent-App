<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceModel extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'bicycle_id',
        'path_id',
        'recent_activity_id',
        'temp_key',
    ];

}
