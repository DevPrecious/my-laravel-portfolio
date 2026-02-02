<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    protected $guarded = [];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getRenderedContentAttribute()
    {
        return Str::markdown($this->content ?? '');
    }

    public function getRenderedExcerptAttribute()
    {
        return Str::markdown($this->excerpt ?? '');
    }

    public function getRenderedTitleAttribute()
    {
        return trim(preg_replace('/^<p>(.*)<\/p>$/s', '$1', Str::markdown($this->title ?? '')));
    }
}
