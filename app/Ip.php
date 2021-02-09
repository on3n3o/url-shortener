<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ip extends Model
{
    protected $table = 'ips';

    protected $fillable = [
        'ip'
    ];

    public function shortLinks()
    {
        return $this->belongsToMany(ShortLink::class, 'short_link_ips', 'ip_id', 'short_link_id')->withPivot('visits')->withTimestamps();
    }
}
