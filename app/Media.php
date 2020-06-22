<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $guarded = [];

    /**
     * @param $query
     *
     * @return mixed
     */
    public function scopeVideos($query) {
        return $query->where('type',1);
    }

    /**
     * @param $query
     *
     * @return mixed
     */
    public function scopePhotos($query) {
        return $query->where('type',0);
    }

    public function event   () {
        return $this->hasOne(Event::class,'id','event_id');
    }
}
