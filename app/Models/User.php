<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $fillable = [
        'users_types_id',
        'name',
        'lastname1',
        'lastname2',
        'email',
        'username',
        'password',
        'image',
    ];
    public function groups()
    {
        return $this->hasMany(Group::class, 'users_id');
    }
}
