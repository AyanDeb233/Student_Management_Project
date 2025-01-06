<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'Courses';
    protected $primaryKey = 'id';
    protected $fillable = ['name','syllabus','duration'];
    use HasFactory;
}
