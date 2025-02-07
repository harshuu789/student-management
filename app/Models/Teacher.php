<?php

namespace App\Models;
use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory, SoftDeletes;
    
    public function students()
    {
        return $this->hasMany(Student::class, 'class_teacher_id');
    }
}
