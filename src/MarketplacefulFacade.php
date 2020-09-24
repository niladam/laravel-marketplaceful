<?php

namespace Marketplaceful;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Marketplaceful\Marketplaceful
 */
class MarketplacefulFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'marketplaceful';
    }
}
