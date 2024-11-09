<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Ngo extends Model
{
    use Notifiable;

    protected $guarded = ['id'];

    protected $fillable = [
        'ngo_name','ngo_reg_no','email','contact_number','logo','ngo_start_date','description','address','banner_images','website','facebook_link','youtube_link','instagram_link','twitter_link'
    ];
}
