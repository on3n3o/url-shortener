<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShortLinkCountry extends Model
{
    protected $table = 'short_link_countries';

    protected $fillable = [
        'short_link_id',
        'country_id',
        'visits',
    ];

    protected $casts = [
        'short_link_id' => 'integer',
        'country_id' => 'integer',
        'visits' => 'integer',
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function shortLink()
    {
        return $this->belongsTo(ShortLink::class);
    }
}
