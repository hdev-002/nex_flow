<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\UniStudentManagement\Models\Student;

class Nrc extends Model
{
    protected $fillable = [
        'name_en', 'name_mm', 'nrc_code'
    ];

    // Reverse relationships (optional, if needed)
    public function student()
    {
        return $this->hasOne(Student::class, 'student_nrc_code', 'id');
    }

    public function fatherOf()
    {
        return $this->hasOne(Student::class, 'father_nrc_code', 'id');
    }

    public function motherOf()
    {
        return $this->hasOne(Student::class, 'mother_nrc_code', 'id');
    }
}
