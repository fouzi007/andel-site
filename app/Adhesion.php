<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adhesion extends Model
{
    protected $guarded = [];

    protected $dates = ['date_start','date_end'];

    public function user() {
        return $this->hasOne(User::class,'id','user_id');
    }

    public function scopePending( $query ) {
        return $query->where('status',false)->where('date_end','>',now());
    }
}
