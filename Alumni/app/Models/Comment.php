<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable =[
        'comment',
        'posts_id',
    ];

    public function comment(){
        return $this->belongsTo('App/Models/Post');
    }
}
