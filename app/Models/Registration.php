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
        'parents_name',
        'wards_name',
        'ward_age',
        'ward_school',
        'location',
        'phone_number',
        'email',
        'start_date',
        'end_date',
    ];
}