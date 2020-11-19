<?php

namespace Marketplaceful;

use Illuminate\Support\Arr;

class Features
{
    protected static $featureOptions = [];

    public static function enabled(string $feature)
    {
        return in_array($feature, config('marketplaceful.features', []));
    }

    public static function optionEnabled(string $feature, string $option)
    {
        return static::enabled($feature) &&
               Arr::get(static::$featureOptions, $feature.'.'.$option) === true;
    }

    public static function authentication()
    {
        return 'authentication';
    }
}
