<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Ngo extends Model
{
    use Notifiable;

    protected $fillable = [
        'name',
        'description',
        'email',
        'password',
        'contact_number',
        'website',
        'facebook_link',
        'twitter_link',
        'instagram_link',
        'address',
        'city',
        'state',
        'country',
        'zip_code',
        'logo',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];


}
