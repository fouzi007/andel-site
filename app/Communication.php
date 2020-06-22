<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Communication extends Model
{
    protected $guarded = [];

    public function evenement() {
        return $this->hasOne(Event::class,'id','event_id');
    }

    public function user() {
        return $this->hasOne(User::class,'id','user_id');
    }
}
