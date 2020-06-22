<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventActivite extends Model
{
    protected $guarded = [];
    public $timestamps = false;

    public function event(  ) {
        return $this->hasOne(Event::class,'id','event_id');
    }

    public function getJourneeAttribute() {
        $jour = new \NumberFormatter(locale_get_default(),\NumberFormatter::ORDINAL);
        return $jour->format($this->jour);
    }
}
