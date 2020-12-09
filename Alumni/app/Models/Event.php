<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable=[
        'organiser_user_id',
        'title',
        'description',
        'picture',
        'location',
        'start_date',
        'end_date',
        'views',
        'status',
        'max_attendees',
    ];
}
