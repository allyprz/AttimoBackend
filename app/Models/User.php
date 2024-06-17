<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Auth\Authenticatable;

class User extends Model implements AuthenticatableContract
{
    use HasFactory, Authenticatable; // Use the Authenticatable trait

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