<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'acronyms',
        'image',
        'consultations',
    ];
    public function groups()
    {
        return $this->hasMany(Group::class, 'courses_id');
    }
}
