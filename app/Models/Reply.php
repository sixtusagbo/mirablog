<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable
     * 
     * @var array<int, string>
     */
    protected $fillable = [
        'content',
        'user_id',
        'comment_id',
    ];

    /**
     * Get the user that owns the reply
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the comment that owns the reply
     */
    public function comments()
    {
        return $this->belongsTo(Comment::class);
    }
}
