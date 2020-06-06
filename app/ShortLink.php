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
            $model->short = Str::random(10);
            $model->uuid = Str::uuid();
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function statistics()
    {
        return $this->hasMany(Statistic::class);
    }
}