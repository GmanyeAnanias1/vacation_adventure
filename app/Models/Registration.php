<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use HasFactory;

    protected $table = 'applicant_details';
    protected $primaryKey = 'id';
    protected $fillable = [
        'registration_type',
        'course_name',
        'parents_name',
        'wards_name',
        'ward_age',
        'ward_school',
        'location',
        'phone_number',
        'email',
        'first_name',
        'middle_name',
        'last_name',
        'school',
        'program',
        'profession',
        'industry',
    ];

    protected $casts = [
        'ward_age' => 'integer',
    ];
}