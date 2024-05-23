<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'post_id', // Add this line
        'user_id',
        'comment',
        // other fields...
    ];

    // Additional model methods and relationships

    public function post()
    {
        return $this->belongsTo(Post::class);
    }


}
