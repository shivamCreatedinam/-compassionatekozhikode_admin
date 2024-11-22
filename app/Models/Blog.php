<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = ['blog_title', 'description', 'blog_start_date', 'added_by', 'blog_images', 'facebook_link','twitter_link', 'twitter_link', 'youtube_link','instagram_link'];
}
