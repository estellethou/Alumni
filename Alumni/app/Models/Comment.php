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
        'user_id',
    ];

    public function post(){
        return $this->belongsTo(Post::class, 'posts_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class); 
    }
}