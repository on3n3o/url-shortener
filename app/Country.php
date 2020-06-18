<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'countries';

    protected $fillable = [
        'iso_code',
        'name',
    ];

    public function shortLinks()
    {
        return $this->belongsToMany(ShortLink::class, 'short_link_countries', 'country_id', 'short_link_id')->withPivot('visits')->withTimestamps();
    }
}
