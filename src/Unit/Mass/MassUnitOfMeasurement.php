<?php

namespace Smaakvoldelen\Units\Unit\Mass;

use Smaakvoldelen\Units\Contracts\UnitOfMeasurement;
use Smaakvoldelen\Units\Unit\Concerns\ConvertsWithFactor;
use Smaakvoldelen\Units\Unit\Concerns\HasValues;

enum MassUnitOfMeasurement: string implements UnitOfMeasurement
{
    use ConvertsWithFactor, HasValues;

    // Metric - Gram
    case ATTO_GRAM = 'attogram';
    case CENTIGRAM = 'centigram';
    case DECA_GRAM = 'decagram';
    case DECI_GRAM = 'decigram';
    case MILLIGRAM = 'milligram';
    case GRAM = 'gram';
    case KILOGRAM = 'kilogram';
    case EXA_GRAM = 'exagram';
    case FEMTO_GRAM = 'femtogram';
    case GIGAGRAM = 'gigagram';
    case HECTOGRAM = 'hectogram';
    case MEGAGRAM = 'megagram';
    case TONNE = 'tonne';
    case MICRO_GRAM = 'microgram';
    case NANO_GRAM = 'nanogram';
    case PETA_GRAM = 'petagram';
    case PICO_GRAM = 'picogram';
    case TERA_GRAM = 'teragram';
    case YOCTO_GRAM = 'yoctogram';
    case YOTTA_GRAM = 'yottagram';
    case ZEPTO_GRAM = 'zeptogram';
    case ZETTA_GRAM = 'zettagram';

    // Imperial - Pound
    case DRAM = 'dram';
    case POUND = 'pound';
    case GRAIN = 'grain';
    case OUNCE = 'ounce';
    case QUARTER = 'quarter';
    case SHORT_TON = 'short_tone';
    case LONG_TON = 'long_ton';
    case STONE = 'stone';

    // Imperial - Troy ounce
    case PENNY_WEIGHT = 'pennyweight';
    case TROY_OUNCE = 'troy_ounce';
    case TROY_POUND = 'troy_pound';

    public static function alias(string $aliasName): UnitOfMeasurement
    {
        // TODO: Implement alias() method.
    }

    public function conversionFactor(): float
    {
        return match ($this) {
            // Metric - Gram
            self::YOTTA_GRAM => 1E24,
            self::ZETTA_GRAM => 1E21,
            self::EXA_GRAM => 1E18,
            self::PETA_GRAM => 1E15,
            self::TERA_GRAM => 1E12,
            self::GIGAGRAM => 1E9,
            self::MEGAGRAM, self::TONNE => 1E6,
            self::KILOGRAM => 1E3,
            self::HECTOGRAM => 1E2,
            self::DECA_GRAM => 1E1,
            self::GRAM => 1,
            self::DECI_GRAM => 1E-1,
            self::CENTIGRAM => 1E-2,
            self::MILLIGRAM => 1E-3,
            self::MICRO_GRAM => 1E-6,
            self::NANO_GRAM => 1E-9,
            self::PICO_GRAM => 1E-12,
            self::FEMTO_GRAM => 1E-15,
            self::ATTO_GRAM => 1E-18,
            self::ZEPTO_GRAM => 1E-21,
            self::YOCTO_GRAM => 1E-24,
            // Imperial - Pound
            self::LONG_TON => 453.59237 * 2240,
            self::SHORT_TON => 453.59237 * 2000,
            self::QUARTER => 453.59237 * 28,
            self::STONE => 453.59237 * 14,
            self::POUND => 453.59237,
            self::OUNCE => 453.59237 * (1 / 16),
            self::DRAM => 453.59237 * (1 / 256),
            self::GRAIN => 453.59237 * (1 / 7000),
            // Imperial - Troy ounce
            self::TROY_OUNCE => 31.1034768,
            self::TROY_POUND => 31.1034768 * 12,
            self::PENNY_WEIGHT => 31.1034768 * (1/20),
        };
    }

    public function getSymbol(): string
    {
        return match ($this) {
            // Metric - Gram
            self::ATTO_GRAM => 'ag',
            self::CENTIGRAM => 'cg',
            self::DECA_GRAM => 'dag',
            self::DECI_GRAM => 'dg',
            self::MILLIGRAM => 'mg',
            self::GRAM => 'g',
            self::KILOGRAM => 'kg',
            self::EXA_GRAM => 'eG',
            self::FEMTO_GRAM => 'fg',
            self::GIGAGRAM => 'Gg',
            self::HECTOGRAM => 'hg',
            self::MEGAGRAM => 'Mg',
            self::TONNE => 'tonne',
            self::MICRO_GRAM => 'μg',
            self::NANO_GRAM => 'ng',
            self::PETA_GRAM => 'Pg',
            self::PICO_GRAM => 'pg',
            self::TERA_GRAM => 'Tg',
            self::YOCTO_GRAM => 'yg',
            self::YOTTA_GRAM => 'Yg',
            self::ZEPTO_GRAM => 'zg',
            self::ZETTA_GRAM => 'Zg',
            // Imperial - Pound
            self::POUND => 'lb',
            self::DRAM => 'dr',
            self::GRAIN => 'gr',
            self::OUNCE => 'oz',
            self::QUARTER => 'qr',
            self::STONE => 'st',
            // Imperial - Troy ounce
            self::PENNY_WEIGHT => 'dwt',
            self::TROY_OUNCE => 'oz t',
            self::TROY_POUND => 'lb t',
            self::SHORT_TON, self::LONG_TON => '',
        };
    }
}
