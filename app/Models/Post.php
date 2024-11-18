<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['ngo_id', 'post_title','post_desc','post_slider_images','post_banner_images'];

    public function ngo(){
        return $this->belongsTo('App\Models\Ngo', 'ngo_id', 'id');
    }
}
