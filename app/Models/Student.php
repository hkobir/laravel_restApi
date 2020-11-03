<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
    'semester_id',
    'section_id',
    'name',
    'email',
    'phone',
    'password',
    'photo',
    'gender',
    'address',
  ];
}
