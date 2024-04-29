<?php

namespace Smaakvoldelen\Units\Unit\Amount;

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
        };
    }

    public function conversionFactor(): float
    {
        return match ($this) {
            self::QUANTITY => 1,
        };
    }

    public function getSymbol(): string
    {
        return match ($this) {
            self::QUANTITY => 'qty',
        };
    }
}
