<?php

namespace Smaakvoldelen\Units\Unit\Concerns;

use Smaakvoldelen\Units\Contracts\UnitOfMeasurement;

trait ConvertsWithBase
{
    /**
     * Convert the given value to the given unit value.
     */
    public function convert(float $value, UnitOfMeasurement $unit): float
    {
        return $unit->convertFromBaseValue($this->convertToBaseValue($value));
    }

    /**
     * Convert the given value from given the base units value.
     *
     * @codeCoverageIgnore
     */
    public function convertFromBaseValue(float $value): float
    {
        return 1.0;
    }

    /**
     * Convert the given value to the base units value.
     *
     * @codeCoverageIgnore
     */
    public function convertToBaseValue(float $value): float
    {
        return 1.0;
    }
}
