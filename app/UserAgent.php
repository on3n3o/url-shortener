<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserAgent extends Model
{
    protected $table = 'link_user_agents';

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
