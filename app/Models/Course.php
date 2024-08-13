<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $table = 'courses';
    protected $primaryKey = 'trans_id';
    protected $fillable = [
        'trans_id',
        'course_code',
        'course_name',
        'deleted',
        'createuser',
        'createdate',
        'modifyuser',
        'modifydate'
        
        
    ];
}