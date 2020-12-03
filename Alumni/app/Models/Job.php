<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'profile',
        'qualifications',
        'year_experiences',
        'street_address',
        'postal_code',
        'city',
        'contract',
        'contract_duration',
        'company_name',
        'sector',
        'user_id'
    ];
    
}