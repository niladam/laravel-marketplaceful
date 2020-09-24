<?php

namespace Marketplaceful\Traits;

trait MarketplacefulAuthenticatable
{
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
}
