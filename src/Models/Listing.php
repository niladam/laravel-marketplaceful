<?php

namespace Marketplaceful\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Marketplaceful\Traits\HasSlug;
use Marketplaceful\Traits\Unguarded;

class Listing extends Model
{
    use HasFactory;
    use HasSlug;
    use Unguarded;

    public function sluggableAttribute()
    {
        return 'title';
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'listings_tags', 'listing_id', 'tag_id')
            ->withPivot('order_column')
            ->orderBy('order_column', 'asc');
    }

    public function scopeTag($query, string $slug)
    {
        return $query->whereHas('tags', function ($query) use ($slug) {
            $query->where('slug', $slug);
        });
    }
}
