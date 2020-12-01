<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'phone',
        'description',
        'url_linkedin',
        'url_github',
        'url_website',
        'image',
        'resume'
    ];

    ## how to match profil with its unique user 
        public function user(){
        return $this->belongsTo(User::class);
        }
}
