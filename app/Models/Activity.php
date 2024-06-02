<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name', 'description', 'image', 'percent', 'scheduled_at', 'labels_activities_id', 'categories_activities_id', 'status_activities_id',
    ];
}
