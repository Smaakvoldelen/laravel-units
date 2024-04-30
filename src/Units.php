<?php

namespace Smaakvoldelen\Units;

use Exception;
use Smaakvoldelen\Units\Unit\Amount\Amount;
use Smaakvoldelen\Units\Unit\Mass\Mass;
use Smaakvoldelen\Units\Unit\Temperature\Temperature;
use Smaakvoldelen\Units\Unit\Unit;
use Smaakvoldelen\Units\Unit\Volume\Volume;

class Units
{
    /**
     * Get any unit from the given expression.
     */
    public function from(string $expression): ?Unit
    {
        $units = [
            Amount::class,
            Mass::class,
            Temperature::class,
            Volume::class,
        ];

        $results = null;

        /** @var Unit $unit */
        foreach ($units as $unit) {
            try {
                $results = $unit::from($expression);
                break;
            } catch (Exception) {
                continue;
            }
        }

        return $results;
    }
}
