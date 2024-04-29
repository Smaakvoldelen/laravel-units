<?php

namespace Smaakvoldelen\Units\Unit\Mass;

use InvalidArgumentException;
use Smaakvoldelen\Units\Contracts\UnitOfMeasurement;
use Smaakvoldelen\Units\Unit\Concerns\ConvertsWithFactor;
use Smaakvoldelen\Units\Unit\Concerns\HasValues;

enum MassUnitOfMeasurement: string implements UnitOfMeasurement
{
    use ConvertsWithFactor, HasValues;

    // Metric - Sorted by conversion factor descending
    case YOTTA_GRAM = 'yottagram';
    case ZETTA_GRAM = 'zettagram';
    case EXA_GRAM = 'exagram';
    case PETA_GRAM = 'petagram';
    case TERA_GRAM = 'teragram';
    case GIGAGRAM = 'gigagram';
    case MEGAGRAM = 'megagram';
    case TONNE = 'tonne';
    case KILOGRAM = 'kilogram';
    case HECTOGRAM = 'hectogram';
    case DECA_GRAM = 'decagram';
    case GRAM = 'gram';
    case DECI_GRAM = 'decigram';
    case CENTIGRAM = 'centigram';
    case MILLIGRAM = 'milligram';
    case MICRO_GRAM = 'microgram';
    case NANO_GRAM = 'nanogram';
    case PICO_GRAM = 'picogram';
    case FEMTO_GRAM = 'femtogram';
    case ATTO_GRAM = 'attogram';
    case ZEPTO_GRAM = 'zeptogram';
    case YOCTO_GRAM = 'yoctogram';

    // Imperial - Pound - Sorted by conversion factor descending
    case LONG_TON = 'long_ton';
    case SHORT_TON = 'short_tone';
    case QUARTER = 'quarter';
    case STONE = 'stone';
    case POUND = 'pound';
    case OUNCE = 'ounce';
    case DRAM = 'dram';
    case GRAIN = 'grain';

    // Imperial - Troy ounce - Sorted by conversion factor descending
    case TROY_POUND = 'troy_pound';
    case TROY_OUNCE = 'troy_ounce';
    case PENNY_WEIGHT = 'pennyweight';

    /**
     * Get the unit by the given alias name.
     */
    public static function alias(string $aliasName): UnitOfMeasurement
    {
        $normalizedAlias = strtolower(str_replace(' ', '', $aliasName));

        return match ($normalizedAlias) {
            'ag', 'attogram', 'attograms' => self::ATTO_GRAM,
            'cg', 'centigram', 'centigrams' => self::CENTIGRAM,
            'dag', 'decagram', 'decagrams' => self::DECA_GRAM,
            'dg', 'decigram', 'decigrams' => self::DECI_GRAM,
            'mg', 'milligram', 'milligrams' => self::MILLIGRAM,
            'g', 'gram', 'grams' => self::GRAM,
            'kg', 'kilogram', 'kilograms' => self::KILOGRAM,
            'eg', 'exagram', 'exagrams' => self::EXA_GRAM,
            'fg', 'femtogram', 'femtograms' => self::FEMTO_GRAM,
            'gg', 'gigagram', 'gigagrams' => self::GIGAGRAM,
            'hg', 'hectogram', 'hectograms' => self::HECTOGRAM,
            'meg', 'megagram', 'megagrams' => self::MEGAGRAM,
            'tonne', 'metricton', 'metrictons' => self::TONNE,
            'μg', 'microgram', 'micrograms' => self::MICRO_GRAM,
            'ng', 'nanogram', 'nanograms' => self::NANO_GRAM,
            'pg', 'petagram', 'petagrams' => self::PETA_GRAM,
            'picog', 'picogram', 'picograms' => self::PICO_GRAM,
            'tg', 'teragram', 'teragrams' => self::TERA_GRAM,
            'yg', 'yoctogram', 'yoctograms' => self::YOCTO_GRAM,
            'yottag', 'yottagram', 'yottagrams' => self::YOTTA_GRAM,
            'zg', 'zeptogram', 'zeptograms' => self::ZEPTO_GRAM,
            'zettag', 'zettagram', 'zettagrams' => self::ZETTA_GRAM,
            'lb', 'pound', 'pounds' => self::POUND,
            'dr', 'dram', 'drams' => self::DRAM,
            'gr', 'grain', 'grains' => self::GRAIN,
            'oz', 'ounce', 'ounces' => self::OUNCE,
            'qr', 'quarter', 'quarters' => self::QUARTER,
            'st', 'stone', 'stones' => self::STONE,
            'stton', 'shortton', 'shorttons' => self::SHORT_TON,
            'longton', 'longtons' => self::LONG_TON,
            'dwt', 'pennyweight', 'pennyweights' => self::PENNY_WEIGHT,
            'ozt', 'troyounce', 'troyounces' => self::TROY_OUNCE,
            'lbt', 'troypound', 'troypounds' => self::TROY_POUND,
            default => throw new InvalidArgumentException("Alias '$aliasName' not recognized.")
        };
    }

    /**
     * Get the conversion factor.
     */
    public function conversionFactor(): float
    {
        return match ($this) {
            // Metric - Gram  - Sorted by conversion factor descending
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

            // Imperial - Pound  - Sorted by conversion factor descending
            self::LONG_TON => 453.59237 * 2240,
            self::SHORT_TON => 453.59237 * 2000,
            self::QUARTER => 453.59237 * 28,
            self::STONE => 453.59237 * 14,
            self::POUND => 453.59237,
            self::OUNCE => 453.59237 * (1 / 16),
            self::DRAM => 453.59237 * (1 / 256),
            self::GRAIN => 453.59237 * (1 / 7000),

            // Imperial - Troy ounce - Sorted by conversion factor descending
            self::TROY_POUND => 31.1034768 * 12,
            self::TROY_OUNCE => 31.1034768,
            self::PENNY_WEIGHT => 31.1034768 * (1 / 20),
        };
    }

    /**
     * Get the symbol of the unit.
     */
    public function getSymbol(): string
    {
        return match ($this) {
            // Metric - Sorted by conversion factor descending
            self::YOTTA_GRAM => 'Yg',
            self::ZETTA_GRAM => 'Zg',
            self::EXA_GRAM => 'eG',
            self::PETA_GRAM => 'Pg',
            self::TERA_GRAM => 'Tg',
            self::GIGAGRAM => 'Gg',
            self::MEGAGRAM => 'Mg',
            self::TONNE => 'tonne',
            self::KILOGRAM => 'kg',
            self::HECTOGRAM => 'hg',
            self::DECA_GRAM => 'dag',
            self::GRAM => 'g',
            self::DECI_GRAM => 'dg',
            self::CENTIGRAM => 'cg',
            self::MILLIGRAM => 'mg',
            self::MICRO_GRAM => 'μg',
            self::NANO_GRAM => 'ng',
            self::PICO_GRAM => 'pg',
            self::FEMTO_GRAM => 'fg',
            self::ATTO_GRAM => 'ag',
            self::ZEPTO_GRAM => 'zg',
            self::YOCTO_GRAM => 'yg',

            // Imperial - Pound - Sorted by conversion factor descending
            self::LONG_TON, self::SHORT_TON => '',
            self::QUARTER => 'qr',
            self::STONE => 'st',
            self::POUND => 'lb',
            self::OUNCE => 'oz',
            self::DRAM => 'dr',
            self::GRAIN => 'gr',

            // Imperial - Troy ounce - Sorted by conversion factor descending
            self::TROY_POUND => 'lb t',
            self::TROY_OUNCE => 'oz t',
            self::PENNY_WEIGHT => 'dwt',
        };
    }
}
