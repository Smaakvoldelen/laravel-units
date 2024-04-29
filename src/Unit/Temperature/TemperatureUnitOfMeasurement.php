<?php

namespace Smaakvoldelen\Units\Unit\Temperature;

use InvalidArgumentException;
use Smaakvoldelen\Units\Contracts\UnitOfMeasurement;
use Smaakvoldelen\Units\Unit\Concerns\ConvertsWithFactor;
use Smaakvoldelen\Units\Unit\Concerns\HasValues;

enum TemperatureUnitOfMeasurement: string implements UnitOfMeasurement
{
    use ConvertsWithFactor, HasValues;

    case CELSIUS = 'celsius';
    case FAHRENHEIT = 'fahrenheit';
    case KELVIN = 'kelvin';
    case RANKINE = 'rankine';
    case ROMER = 'romer';

    /**
     * Get the unit by the given alias name.
     */
    public static function alias(string $aliasName): UnitOfMeasurement
    {
        $normalizedAlias = strtolower(str_replace([' ', 'o', '0', '°'], '', $aliasName));

        return match ($normalizedAlias) {
            'c', 'celsius', 'degc', 'degreesC', 'degreescelsius' => self::CELSIUS,
            'f', 'fahrenheit', 'degf', 'degreesF', 'degreesfahrenheit' => self::FAHRENHEIT,
            'k', 'kelvin' => self::KELVIN,
            'r', 'rankine', 'degr', 'degreesR', 'degreesrankine' => self::RANKINE,
            'rø', 'romer', 'degrø', 'degreesrø', 'degreesromer' => self::ROMER,
            default => throw new InvalidArgumentException("Alias '$aliasName' not recognized.")
        };
    }

    /**
     * Get the conversion factor.
     */
    public function conversionFactor(): float
    {
        return match ($this) {
            self::CELSIUS => 273.15,
            self::FAHRENHEIT => (459.67 + 32) * (5 / 9),
            self::KELVIN => 1,
            self::RANKINE => 5 / 9,
            self::ROMER => (40 / 21) + 273.15 - 7.5 * (40 / 21),
        };
    }

    /**
     * Get the symbol of the unit.
     */
    public function getSymbol(): string
    {
        return match ($this) {
            self::CELSIUS => '°C',
            self::FAHRENHEIT => '°F',
            self::KELVIN => 'K',
            self::RANKINE => '°R',
            self::ROMER => '°Rø',

        };
    }
}
