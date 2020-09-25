<?php

namespace Marketplaceful\Rules;

use Illuminate\Contracts\Validation\Rule;

class Hex implements Rule
{
    protected $forceFull;

    public function __construct($forceFull = false)
    {
        $this->forceFull = $forceFull;
    }

    public function passes($attribute, $value)
    {
        $pattern = '/^#([a-fA-F0-9]{6}';

        if (! $this->forceFull) {
            $pattern .= '|[a-fA-F0-9]{3}';
        }

        $pattern .= ')$/';

        return (bool) preg_match($pattern, $value);
    }

    public function message()
    {
        return __('The :attribute must be a valid color.') ?? '';
    }
}
