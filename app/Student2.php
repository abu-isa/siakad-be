<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'students';

    protected $fillable = [
        'student_number',
        'student_name',
        'student_email',
        'student_phone',
        'student_address'
    ];

}