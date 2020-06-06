<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
    protected $table = 'statistics';

    protected $fillable = [
        'short_link_id',
        'user_agent',
        'count'
    ];

    protected $casts = [
        'short_link_id' => 'integer',
        'count' => 'integer',
    ];

    public function shortLink()
    {
        return $this->belongsTo(ShortLink::class);
    }
}
