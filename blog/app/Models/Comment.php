<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = ['body', 'user_id', 'blog_id'];

    public function author() //comment->author
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
