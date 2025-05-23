<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $fillable = ['student_name', 'class_teacher_id', 'class', 'admission_date', 'yearly_fees'];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'class_teacher_id');
    }
}
