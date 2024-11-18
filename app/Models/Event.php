<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Member;

class Event extends Model
{
    use HasFactory;

    protected $fillable = ['id','event_banner','event_title', 'event_short_desc','event_long_desc','event_date'];

    public function member(){
        return $this->hasMany(Member::class, 'event_id', 'id');
    }
}
