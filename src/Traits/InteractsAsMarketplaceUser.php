<?php

namespace Marketplaceful\Traits;

use Marketplaceful\Models\Conversation;
use Marketplaceful\Models\Listing;

trait InteractsAsMarketplaceUser
{
    public function initializeInteractsAsMarketplaceUser()
    {
        $this->casts['last_seen_at'] = 'datetime';
        $this->casts['super'] = 'boolean';
    }

    public function listings()
    {
        return $this->hasMany(Listing::class, 'author_id');
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function scopeSuspended($query)
    {
        return $query->where('status', 'inactive');
    }

    public function isActive()
    {
        return $this->status == 'active';
    }

    public function isSuspended()
    {
        return $this->status == 'inactive';
    }

    public function isSuper()
    {
        return $this->super;
    }

    public function belongsToConversation($conversation)
    {
        return $this->conversations->contains('id', $conversation->id);
    }

    public function hasUnReadConversations()
    {
        return $this->conversations()->wherePivot('read_at', null)->count();
    }

    public function hasRead(Conversation $conversation)
    {
        return $this->conversations->find($conversation->id)->pivot->read_at;
    }

    public function conversations()
    {
        return $this->belongsToMany(Conversation::class)->withPivot('read_at');
    }

    public function getConversationNameAttribute()
    {
        if ($this->id === auth()->id()) {
            return 'You';
        }

        return $this->name;
    }
}
