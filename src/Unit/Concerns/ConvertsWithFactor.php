<?php

namespace Smaakvoldelen\Units\Unit\Concerns;

trait ConvertsWithFactor
{
    use ConvertsWithBase;

    /**
     * Get the conversion factor.
     */
    public function conversionFactor(): float
    {
        return 1.0;
    }

    /**
     * Convert the given value from given the base units value.
     */
    public function convertFromBaseValue(float $value): float
    {
        return $value / $this->conversionFactor();
    }

    /**
     * Convert the given value to the base units value.
     */
    public function convertToBaseValue(float $value): float
    {
        return $value * $this->conversionFactor();
    }
}
