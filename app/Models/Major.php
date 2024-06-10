<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    use HasFactory;

    public function students()
    {
        return $this->belongsToMany(User::class, 'majors_users', 'majors_id', 'users_id');
    }

}