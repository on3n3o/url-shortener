<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShortLinkIp extends Model
{
    protected $table = 'short_link_ips';

    protected $fillable = [
        'ip_id',
        'short_link_id',
        'visits',
    ];

    protected $casts = [
        'ip_id' => 'integer',
        'short_link_id' => 'integer',
        'visits' => 'integer',
    ];

    public function ip()
    {
        return $this->belongsTo(Ip::class);
    }

    public function shortLink()
    {
        return $this->belongsTo(ShortLink::class);
    }
}
