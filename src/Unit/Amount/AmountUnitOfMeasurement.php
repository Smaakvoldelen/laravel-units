<?php

namespace Smaakvoldelen\Units\Unit\Amount;

use InvalidArgumentException;
use Smaakvoldelen\Units\Contracts\UnitOfMeasurement;
use Smaakvoldelen\Units\Unit\Concerns\ConvertsWithFactor;
use Smaakvoldelen\Units\Unit\Concerns\HasValues;

enum AmountUnitOfMeasurement: string implements UnitOfMeasurement
{
    use ConvertsWithFactor, HasValues;

    case QUANTITY = 'quantity';

    public static function alias(string $aliasName): UnitOfMeasurement
    {
        $normalizedAlias = strtolower(str_replace(' ', '', $aliasName));

        return match ($normalizedAlias) {
            'amount', 'amounts', 'pcs', 'piece', 'pieces', 'qty', 'quantity', 'quantities' => self::QUANTITY,
            default => throw new InvalidArgumentException("Alias '$aliasName' not recognized.")
        };
    }

    /**
     * Get the name of the unit.
     */
    public function getName(): string
    {
        return $this->value;
    }

    public function getSymbol(): string
    {
        return match ($this) {
            self::QUANTITY => 'qty',
        };
    }
}
