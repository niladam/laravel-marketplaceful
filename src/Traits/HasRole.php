<?php

namespace Marketplaceful\Traits;

use Illuminate\Support\Str;
use Laravel\Jetstream\Jetstream;
use Laravel\Jetstream\OwnerRole;
use Laravel\Sanctum\HasApiTokens;

trait HasRole
{
    public function ownsMarketplace()
    {
        return $this->role == 'owner';
    }

    public function role()
    {
        if ($this->ownsMarketplace()) {
            return new OwnerRole;
        }

        if (! $this->role) {
            return;
        }

        return Jetstream::findRole($this->role);
    }

    public function permissions()
    {
        if ($this->ownsMarketplace()) {
            return ['*'];
        }

        if (! $this->role) {
            return [];
        }

        return $this->role()->permissions;
    }

    public function hasPermission(string $permission)
    {
        if (in_array(HasApiTokens::class, class_uses_recursive($this)) &&
            ! $this->tokenCan($permission) &&
            $this->currentAccessToken() !== null) {
            return false;
        }

        $permissions = $this->permissions();

        return in_array($permission, $permissions) ||
               in_array('*', $permissions) ||
               (Str::endsWith($permission, ':create') && in_array('*:create', $permissions)) ||
               (Str::endsWith($permission, ':update') && in_array('*:update', $permissions));
    }
}
