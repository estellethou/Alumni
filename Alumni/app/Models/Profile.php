<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    //protected $guarded = [];

    #add default img for profile
    //public function profileImage(){
    //$imagePath = ($this->image) ? $this->image : 'profile/logo.png';
    //return '/storage/' . $imagePath ;
    //}
    
    protected $fillable = [
        'user_id',
        'phone',
        'description',
        'url_linkedin',
        'url_github',
        'url_website',
        'image',
        'resume',
    ];

    ## how to match profil with its unique user 
        public function user(){
        return $this->belongsTo(User::class);
        }
}
