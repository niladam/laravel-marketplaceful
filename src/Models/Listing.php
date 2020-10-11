<?php

namespace Marketplaceful\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Marketplaceful\Database\Factories\ListingFactory;
use Marketplaceful\Traits\HasFeatureImage;
use Marketplaceful\Traits\HasSlug;
use Marketplaceful\Traits\Unguarded;

class Listing extends Model
{
    use HasFactory;
    use HasSlug;
    use Unguarded;
    use HasFeatureImage;

    protected $casts = [
        'author_id' => 'integer',
    ];

    protected static function newFactory()
    {
        return ListingFactory::new();
    }

    public function sluggableAttribute()
    {
        return 'title';
    }

    public function author()
    {
        return $this->belongsTo(config('marketplaceful.user_model'));
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'listings_tags', 'listing_id', 'tag_id')
            ->withPivot('order_column')
            ->orderBy('order_column', 'asc');
    }

    public function conversations()
    {
        return $this->hasMany(Conversation::class);
    }

    public function scopeTag($query, string $slug)
    {
        return $query->whereHas('tags', function ($query) use ($slug) {
            $query->where('slug', $slug);
        });
    }

    public function getPriceForHumansAttribute()
    {
        return number_format($this->price / 100, 2);
    }

    public function setPriceForComputersAttribute($value)
    {
        $value = str_replace(',', '.', $value);

        $price = number_format(floatval($value) * 100, 0, '', '');

        $this->price = $price;
    }
}
