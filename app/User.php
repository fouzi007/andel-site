<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = ['name','is_active_on_event','wilaya_name'];



    public function events() {
        return $this->belongsToMany(Event::class,'user_events','user_id','event_id')->withPivot(['is_active','with_persons']);
    }

    /**
     * @param $event
     *
     * @return bool
     */
    public function alreadyRegistred( $event ) {
        return $this->events()->find($event) !== null;
    }

    public function getIsActiveOnEventAttribute() {
        return $this->events()->find(featured_event())->pivot->is_active;
    }
    /**
     * @return string
     */
    public function getNameAttribute()
    {
      return $this->nom . ' ' . $this->prenom;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function adhesions() {
        return $this->hasMany(Adhesion::class,'user_id','id');
    }

    /**
     * @return bool
     */
    public function estAdherent() {
        return $this->adhesions()->where('status',true)->count() !== 0;
    }

    public function getActiveAdhesionAttribute() {
        return $this->adhesions->first();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function role() {
        return $this->hasOne(Role::class,'id','role_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function wilaya() {
        return $this->hasOne(Wilaya::class,'id','wilaya_id');
    }

    public function getWilayaNameAttribute()
    {
      return $this->wilaya->nom;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function articles() {
        return $this->hasMany(Article::class,'created_by_id','id');
    }

    public function hasRole( $role ) {
        return $this->role->name == $role;
    }

    public function scopeNotAdmins($query) {
        return $query->where('role_id','!=',1);
    }

    /**
     * Relation avec la table communications
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function communications() {
        return $this->hasMany(Communication::class,'user_id','id');
    }

    /**
     * Vérifie si l'utilisateur a une communication relative a l'évènement en cours .
     * @return bool
     */
    public function hasFeaturedCommunication() {
        return $this->communications()->where('event_id',featured_event()->id)->count() !==0;
    }
}
