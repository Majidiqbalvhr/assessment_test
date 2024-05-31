<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'slug',
        'Categories',
        'description',
        'post_img',
        'user_id',
        'views'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
