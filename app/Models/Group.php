<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $fillable = [
        'courses_id',
        'day_of_week',
        'start_time',
        'end_time',
        'users_id', 
    ];
    public function course()
    {
        return $this->belongsTo(Course::class, 'courses_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function students()
    {
        return $this->belongsToMany(User::class, 'users_groups', 'groups_id', 'users_id');
    }
}
