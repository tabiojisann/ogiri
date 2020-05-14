<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\hasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Theme extends Model
{

    protected $fillable = [
        'body',
        'image',
        
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo('App\User');
    }

    public function answers(): hasMany
    {
        return $this->hasMany('App\Answer');
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany('App\Tag', 'theme_tag')->withTimestamps();
    }
}

