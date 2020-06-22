<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $guarded = [];

    protected $dates = ['created_at','updated_at','date_start','date_end'];


    public function getRouteKeyName() {
        return 'slug';
    }

    public function participants() {
        return $this->belongsToMany(User::class,'user_events','event_id','user_id')->withPivot(['is_active','with_persons']);
    }

    /**
     * @return mixed
     */
    public function getLatitudeAttribute() {
        if($this->coordonnes !== null) {
            return json_decode($this->coordonnes)->lat;
        }
        return null;
    }


    /**
     * @return mixed
     */
    public function getLongitudeAttribute() {
        if($this->coordonnes !== null) {
            return json_decode($this->coordonnes)->long;
        }
        return null;
    }

    public function activite() {
        return $this->hasMany(EventActivite::class,'event_id','id');
    }

    /**
     * @param string $debut
     * @param string $fin
     * @param string $description
     * @param string $jour
     */
    public function addActivite( string $debut, string $fin , string $description , string $jour) {
        $this->activite()->create([
            'debut' => $debut,
            'fin' => $fin,
            'description' => $description,
            'jour' => $jour
        ]);
    }

    /**
     * @return int
     */
    public function getDureeEnJoursAttribute() {
        return  $this->date_start->diffInDays($this->date_end) + 1;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function medias() {
        return $this->hasMany(Media::class,'event_id','id');
    }

    public function getImagesCountAttribute() {
        return $this->medias()->where('type',0)->count();
    }


}
