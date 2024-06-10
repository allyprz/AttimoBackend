<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MajorsCourse extends Model
{
    use HasFactory;

    protected $fillable = [
        'majors_id',
        'courses_id',
    ];
}
