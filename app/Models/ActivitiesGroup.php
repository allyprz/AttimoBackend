<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivitiesGroup extends Model
{
    use HasFactory;

    protected $fillable = [
        'groups_id',
        'activities_id'
    ];
}
