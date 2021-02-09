<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ShortLink extends Model
{
    protected $fillable = [
        'short', 
        'url',
        'user_id'
    ];

    protected $casts = [
        'user_id' => 'integer'
    ];

    public static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->short = Str::random(5);
            $model->uuid = Str::uuid();
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function userAgents()
    {
        return $this->hasMany(UserAgent::class);
    }

    public function countries()
    {
        return $this->belongsToMany(Country::class, 'short_link_countries', 'short_link_id', 'country_id')->withPivot('visits')->withTimestamps();
    }

    public function ips()
    {
        return $this->belongsToMany(Ip::class, 'short_link_ips', 'short_link_id', 'ip_id')->withPivot('visits')->withTimestamps();
    }
}