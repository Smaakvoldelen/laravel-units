<?php

namespace Smaakvoldelen\Units\Facades;

use Illuminate\Support\Facades\Facade;
use Smaakvoldelen\Units\Unit\Unit;

/**
 * @method static Unit|null from(string $expression)
 *
 * @see \Smaakvoldelen\Units\Units
 */
class Units extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Smaakvoldelen\Units\Units::class;
    }
}
