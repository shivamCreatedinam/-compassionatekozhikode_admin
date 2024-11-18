<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Event;

class Member extends Model
{
    use HasFactory;

    protected $fillable = ['event_id','member_name'];

    public function event(){
        return $this->belongsTo(Event::class,'event_id','id');
    }
}
