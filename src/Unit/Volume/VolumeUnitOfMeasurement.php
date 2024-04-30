<?php

namespace Smaakvoldelen\Units\Unit\Volume;

use InvalidArgumentException;
use Smaakvoldelen\Units\Contracts\UnitOfMeasurement;
use Smaakvoldelen\Units\Unit\Concerns\ConvertsWithFactor;
use Smaakvoldelen\Units\Unit\Concerns\HasValues;

enum VolumeUnitOfMeasurement: string implements UnitOfMeasurement
{
    use ConvertsWithFactor, HasValues;

    // Metric - Cubic Meter - Sorted by conversion factor descending
    case CUBIC_YOTTA_METER = 'cubic_yottameter';
    case CUBIC_ZETTA_METER = 'cubic_zettameter';
    case CUBIC_EXA_METER = 'cubic_exameter';
    case CUBIC_PETA_METER = 'cubic_petameter';
    case CUBIC_TERA_METER = 'cubic_terameter';
    case CUBIC_GIGAMETER = 'cubic_gigameter';
    case CUBIC_MEGAMETER = 'cubic_megameter';
    case CUBIC_KILOMETER = 'kilometer';
    case CUBIC_HECTOMETER = 'cubic_hectometer';
    case CUBIC_DECA_METER = 'cubic_decameter';
    case CUBIC_METER = 'cubic_meter';
    case CUBIC_DECI_METER = 'cubic_decimeter';
    case CUBIC_CENTIMETER = 'cubic_centimeter';
    case CUBIC_MILLIMETER = 'cubic_millimeter';
    case CUBIC_MICRO_METER = 'cubic_micrometer';
    case CUBIC_NANO_METER = 'cubic_nanometer';
    case CUBIC_PICO_METER = 'cubic_picometer';
    case CUBIC_FEMTO_METER = 'cubic_femtometer';
    case CUBIC_ATTO_METER = 'cubic_attometer';
    case CUBIC_ZEPTO_METER = 'cubic_zeptometer';
    case CUBIC_YOCTO_METER = 'cubic_yoctometer';

    // Metric - Liter - Sorted by conversion factor descending
    case YOTTA_LITER = 'yottaliter';
    case ZETTA_LITER = 'zettaliter';
    case EXA_LITER = 'exaliter';
    case PETA_LITER = 'petaliter';
    case TERA_LITER = 'teraliter';
    case GIGA_LITER = 'gigaliter';
    case MEGA_LITER = 'megaliter';
    case KILO_LITER = 'kiloliter';
    case HECTO_LITER = 'hectoliter';
    case DECA_LITER = 'decaliter';
    case LITER = 'liter';
    case DECI_LITER = 'deciliter';
    case CENTILITER = 'centiliter';
    case MILLILITER = 'milliliter';
    case MICRO_LITER = 'μl';
    case NANO_LITER = 'nl';
    case PICO_LITER = 'pl';
    case FEMTO_LITER = 'fl';
    case ATTO_LITER = 'attoliter';
    case ZEPTO_LITER = 'zeptoliter';
    case YOCTO_LITER = 'yoctoliter';

    // Imperial - Sorted by conversion factor descending
    case ACRE_FOOT = 'acre_foot';
    case CUBIC_YARD = 'cubic_yard';
    case CUBIC_FOOT = 'cubic_foot';
    case CUBIC_INCH = 'cubic_inch';

    // Imperial - Gallon and other volumes - Sorted by conversion factor descending
    case HOGSHEAD = 'hogshead';
    case LIQUID_BARREL = 'liquid_barrel';
    case OIL_BARREL = 'oil_barrel';
    case LIQUID_GALLON = 'liquid_gallon';
    case GALLON = 'gallon';
    case US_LIQUID_QUART = 'us_liquid_quart';
    case US_LIQUID_PINT = 'us_liquid_pint';
    case DRY_BARREL = 'dry_barrel';
    case BUSHEL = 'bushel';
    case DRY_GALLON = 'dry_gallon';
    case US_GILL = 'us_gill';
    case GILL = 'gill';
    case CUP = 'cup';
    case US_FLUID_OUNCE = 'us_fluid_ounce';
    case FLUID_OUNCE = 'fluid_ounce';
    case TABLESPOON = 'tablespoon';
    case TEASPOON = 'teaspoon';
    case US_FLUID_DRAM = 'us_fluid_dram';
    case FLUID_DRAM = 'fluid_dram';
    case FLUID_SCRUPLE = 'fluid_scruple';
    case MINIM = 'minim';
    case US_MINIM = 'us_minim';
    case US_SHOT = 'us_shot';

    // Imperial - Dry Measures - Sorted by conversion factor descending
    case DRY_QUART = 'dry_quart';
    case DRY_PINT = 'dry_pint';

    /**
     * Get the unit by the given alias name.
     */
    public static function alias(string $aliasName): UnitOfMeasurement
    {
        $normalizedAlias = strtolower(str_replace(' ', '', $aliasName));

        return match ($normalizedAlias) {
            // Metric - Cubic Meter
            'cubicyottameter', 'cubicyottameters', 'yottam3' => self::CUBIC_YOTTA_METER,
            'cubiczettameter', 'cubiczettameters', 'zettam3' => self::CUBIC_ZETTA_METER,
            'cubicexameter', 'cubicexameters', 'em3' => self::CUBIC_EXA_METER,
            'cubicpetameter', 'cubicpetameters', 'pm3' => self::CUBIC_PETA_METER,
            'cubicterameter', 'cubicterameters', 'tm3' => self::CUBIC_TERA_METER,
            'cubicgigameter', 'cubicgigameters', 'gm3' => self::CUBIC_GIGAMETER,
            'cubicmegameter', 'cubicmegameters', 'megam3' => self::CUBIC_MEGAMETER,
            'cubickilometer', 'cubickilometers', 'km3' => self::CUBIC_KILOMETER,
            'cubichectometer', 'cubichectometers', 'hm3' => self::CUBIC_HECTOMETER,
            'cubicdecameter', 'cubicdecameters', 'dam3' => self::CUBIC_DECA_METER,
            'cubicmeter', 'cubicmeters', 'm3' => self::CUBIC_METER,
            'cubicdecimeter', 'cubicdecimeters', 'dm3' => self::CUBIC_DECI_METER,
            'cubiccentimeter', 'cubiccentimeters', 'cm3' => self::CUBIC_CENTIMETER,
            'cubicmillimeter', 'cubicmillimeters', 'mm3' => self::CUBIC_MILLIMETER,
            'cubicmicrometer', 'cubicmicrometers', 'μm3' => self::CUBIC_MICRO_METER,
            'cubicnanometer', 'cubicnanometers', 'nm3' => self::CUBIC_NANO_METER,
            'cubicpicometer', 'cubicpicometers', 'picom3' => self::CUBIC_PICO_METER,
            'cubicfemtometer', 'cubicfemtometers', 'fm3' => self::CUBIC_FEMTO_METER,
            'cubicattometer', 'cubicattometers', 'am3' => self::CUBIC_ATTO_METER,
            'cubiczeptometer', 'cubiczeptometers', 'zm3' => self::CUBIC_ZEPTO_METER,
            'cubicyoctometer', 'cubicyoctometers', 'ym3' => self::CUBIC_YOCTO_METER,

            // Metric - Liter
            'yottaliter', 'yottaliters', 'yottal' => self::YOTTA_LITER,
            'zettaliter', 'zettaliters', 'zettal' => self::ZETTA_LITER,
            'exaliter', 'exaliters', 'el' => self::EXA_LITER,
            'petaliter', 'petaliters', 'pl' => self::PETA_LITER,
            'teraliter', 'teraliters', 'tl' => self::TERA_LITER,
            'gigaliter', 'gigaliters', 'gl' => self::GIGA_LITER,
            'megaliter', 'megaliters', 'mel' => self::MEGA_LITER,
            'kiloliter', 'kiloliters', 'kl' => self::KILO_LITER,
            'hectoliter', 'hectoliters', 'hl' => self::HECTO_LITER,
            'decaliter', 'decaliters', 'dal' => self::DECA_LITER,
            'liter', 'liters', 'l' => self::LITER,
            'deciliter', 'deciliters', 'dl' => self::DECI_LITER,
            'centiliter', 'centiliters', 'cl' => self::CENTILITER,
            'milliliter', 'milliliters', 'ml' => self::MILLILITER,
            'microliter', 'microliters', 'μl' => self::MICRO_LITER,
            'nanoliter', 'nanoliters', 'nl' => self::NANO_LITER,
            'picoliter', 'picoliters', 'picol' => self::PICO_LITER,
            'femtoliter', 'femtoliters', 'fl' => self::FEMTO_LITER,
            'attoliter', 'attoliters', 'al' => self::ATTO_LITER,
            'zeptoliter', 'zeptoliters', 'zl' => self::ZEPTO_LITER,
            'yoctoliter', 'yoctoliters', 'yl' => self::YOCTO_LITER,

            // Imperial - Cubic
            'cubicyard', 'cubicyards', 'yd3' => self::CUBIC_YARD,
            'cubicfoot', 'cubicfeet', 'ft3' => self::CUBIC_FOOT,
            'cubicinch', 'cubicinches', 'in3' => self::CUBIC_INCH,
            'acrefoot', 'acrefeet', 'acreft' => self::ACRE_FOOT,

            // Imperial - Gallon and other volumes
            'hogshead', 'hogsheads' => self::HOGSHEAD,
            'liquidbarrel', 'liquidbarrels' => self::LIQUID_BARREL,
            'oilbarrel', 'oilbarrels' => self::OIL_BARREL,
            'liquidgallon', 'liquidgallons', 'gal' => self::LIQUID_GALLON,
            'gallon', 'gallons', 'ukgal' => self::GALLON,
            'usliquidquart', 'usliquidquarts', 'usqt' => self::US_LIQUID_QUART,
            'usliquidpint', 'usliquidpints', 'uspt' => self::US_LIQUID_PINT,
            'drybarrel', 'drybarrels' => self::DRY_BARREL,
            'bushel', 'bushels', 'bu' => self::BUSHEL,
            'drygallon', 'drygallons', 'drygal' => self::DRY_GALLON,
            'usgill', 'usgills', 'usgi' => self::US_GILL,
            'gill', 'gills', 'ukgi' => self::GILL,
            'cup', 'cups', 'cp' => self::CUP,
            'usfluiddram', 'usfluiddrams', 'usfldr' => self::US_FLUID_DRAM,
            'fluiddram', 'fluiddrams', 'ukfldr' => self::FLUID_DRAM,
            'fluidounce', 'fluidounces', 'ukfloz' => self::FLUID_OUNCE,
            'usfluidounce', 'usfluidounces', 'usfloz' => self::US_FLUID_OUNCE,
            'tablespoon', 'tablespoons', 'tbsp' => self::TABLESPOON,
            'teaspoon', 'teaspoons', 'tsp' => self::TEASPOON,
            'usshot', 'usshots', 'shot' => self::US_SHOT,
            'minim', 'minims', 'min' => self::MINIM,
            'usminim', 'usminims', 'usmin' => self::US_MINIM,
            'fluidscruple', 'fluidscruples', 'flscr' => self::FLUID_SCRUPLE,

            // Imperial - Dry Measures
            'dryquart', 'dryquarts', 'dryqt' => self::DRY_QUART,
            'drypint', 'drypints', 'drypt' => self::DRY_PINT,

            default => throw new InvalidArgumentException("Alias '$aliasName' not recognized.")
        };
    }

    /**
     * Get the conversion factor.
     */
    public function conversionFactor(): float
    {
        return match ($this) {
            // Metric - Cubic Meter
            self::CUBIC_YOTTA_METER => 1E72,
            self::CUBIC_ZETTA_METER => 1E63,
            self::CUBIC_EXA_METER => 1E54,
            self::CUBIC_PETA_METER => 1E45,
            self::CUBIC_TERA_METER => 1E36,
            self::CUBIC_GIGAMETER => 1E27,
            self::CUBIC_MEGAMETER => 1E18,
            self::CUBIC_KILOMETER => 1E9,
            self::CUBIC_HECTOMETER => 1E6,
            self::CUBIC_DECA_METER => 1E3,
            self::CUBIC_METER => 1,
            self::CUBIC_DECI_METER => 1E-3,
            self::CUBIC_CENTIMETER => 1E-6,
            self::CUBIC_MILLIMETER => 1E-9,
            self::CUBIC_MICRO_METER => 1E-18,
            self::CUBIC_NANO_METER => 1E-27,
            self::CUBIC_PICO_METER => 1E-36,
            self::CUBIC_FEMTO_METER => 1E-45,
            self::CUBIC_ATTO_METER => 1E-54,
            self::CUBIC_ZEPTO_METER => 1E-63,
            self::CUBIC_YOCTO_METER => 1E-72,

            // Metric - Liter
            self::YOTTA_LITER => 1E24,
            self::ZETTA_LITER => 1E21,
            self::EXA_LITER => 1E18,
            self::PETA_LITER => 1E15,
            self::TERA_LITER => 1E12,
            self::GIGA_LITER => 1E9,
            self::MEGA_LITER => 1E6,
            self::KILO_LITER => 1E3,
            self::HECTO_LITER => 1E2,
            self::DECA_LITER => 1E1,
            self::LITER => 1,
            self::DECI_LITER => 1E-1,
            self::CENTILITER => 1E-2,
            self::MILLILITER => 1E-3,
            self::MICRO_LITER => 1E-6,
            self::NANO_LITER => 1E-9,
            self::PICO_LITER => 1E-12,
            self::FEMTO_LITER => 1E-15,
            self::ATTO_LITER => 1E-18,
            self::ZEPTO_LITER => 1E-21,
            self::YOCTO_LITER => 1E-24,

            // Imperial - Cubic
            self::ACRE_FOOT => 1233.48,
            self::CUBIC_YARD => 0.764555,
            self::CUBIC_FOOT => 0.0283168,
            self::CUBIC_INCH => 0.0000163871,

            // Imperial - Gallon and other volumes
            self::HOGSHEAD => 0.238481,  // Assuming U.K. hogshead
            self::LIQUID_BARREL => 0.11924,  // Assuming U.K. liquid barrel
            self::OIL_BARREL => 0.158987,  // U.S. oil barrel
            self::LIQUID_GALLON => 0.00378541,  // U.S. liquid gallon
            self::GALLON => 0.00454609,  // U.K. gallon
            self::US_LIQUID_QUART => 0.000946353,  // U.S. quart
            self::US_LIQUID_PINT => 0.000473176,  // U.S. pint
            self::DRY_BARREL => 0.115627,  // U.S. dry barrel
            self::BUSHEL => 0.0363687,
            self::DRY_GALLON => 0.00440488,  // U.S. dry gallon
            self::US_GILL => 0.000118294,  // U.S. gill
            self::GILL => 0.000142065,  // U.K. gill
            self::CUP => 0.000236588,  // Assuming U.S. cup
            self::US_FLUID_OUNCE => 0.0000295735,  // U.S. fluid ounce
            self::FLUID_OUNCE => 0.0000284131,  // U.K. fluid ounce
            self::TABLESPOON => 0.0000147868,  // Assuming U.S. tablespoon
            self::TEASPOON => 0.00000492892,  // Assuming U.S. teaspoon
            self::US_FLUID_DRAM => 0.00000369669,  // U.S. fluid dram
            self::FLUID_DRAM => 0.00000355163,  // U.K. fluid dram
            self::FLUID_SCRUPLE => 0.00000129598,  // U.K. fluid scruple
            self::MINIM => 0.0000000591939,  // U.K. minim
            self::US_MINIM => 0.0000000616115,  // U.S. minim
            self::US_SHOT => 0.0000443603,  // Assuming U.S. shot

            // Imperial - Dry Measures
            self::DRY_QUART => 0.00110122,
            self::DRY_PINT => 0.000550611,
        };
    }

    /**
     * Get the name of the unit.
     */
    public function getName(): string
    {
        return $this->value;
    }

    /**
     * Get the symbol of the unit.
     */
    public function getSymbol(): string
    {
        return match ($this) {
            // Metric - Cubic Meter
            self::CUBIC_YOTTA_METER => 'Ym3',
            self::CUBIC_ZETTA_METER => 'Zm3',
            self::CUBIC_EXA_METER => 'Em3',
            self::CUBIC_PETA_METER => 'Pm3',
            self::CUBIC_TERA_METER => 'Tm3',
            self::CUBIC_GIGAMETER => 'Gm3',
            self::CUBIC_MEGAMETER => 'Mm3',
            self::CUBIC_KILOMETER => 'km3',
            self::CUBIC_HECTOMETER => 'hm3',
            self::CUBIC_DECA_METER => 'dam3',
            self::CUBIC_METER => 'm3',
            self::CUBIC_DECI_METER => 'dm3',
            self::CUBIC_CENTIMETER => 'cm3',
            self::CUBIC_MILLIMETER => 'mm3',
            self::CUBIC_MICRO_METER => 'μm3',
            self::CUBIC_NANO_METER => 'nm3',
            self::CUBIC_PICO_METER => 'pm3',
            self::CUBIC_FEMTO_METER => 'fm3',
            self::CUBIC_ATTO_METER => 'am3',
            self::CUBIC_ZEPTO_METER => 'zm3',
            self::CUBIC_YOCTO_METER => 'ym3',

            // Metric - Liter
            self::YOTTA_LITER => 'Yl',
            self::ZETTA_LITER => 'Zl',
            self::EXA_LITER => 'El',
            self::PETA_LITER => 'Pl',
            self::TERA_LITER => 'Tl',
            self::GIGA_LITER => 'Gl',
            self::MEGA_LITER => 'Ml',
            self::KILO_LITER => 'kl',
            self::HECTO_LITER => 'hl',
            self::DECA_LITER => 'dal',
            self::LITER => 'l',
            self::DECI_LITER => 'dl',
            self::CENTILITER => 'cl',
            self::MILLILITER => 'ml',
            self::MICRO_LITER => 'μl',
            self::NANO_LITER => 'nl',
            self::PICO_LITER => 'pl',
            self::FEMTO_LITER => 'fl',
            self::ATTO_LITER => 'al',
            self::ZEPTO_LITER => 'zl',
            self::YOCTO_LITER => 'yl',

            // Imperial - Cubic
            self::ACRE_FOOT => 'acre ft',
            self::CUBIC_YARD => 'yd3',
            self::CUBIC_FOOT => 'ft3',
            self::CUBIC_INCH => 'in3',

            // Imperial - Gallon and other volumes
            self::HOGSHEAD, self::DRY_BARREL, self::OIL_BARREL, self::LIQUID_BARREL => 'bbl',
            self::LIQUID_GALLON, self::DRY_GALLON, self::GALLON => 'gal',
            self::US_LIQUID_QUART, self::DRY_QUART => 'qt',
            self::US_LIQUID_PINT, self::DRY_PINT => 'pt',
            self::BUSHEL => 'bu',
            self::US_GILL, self::US_SHOT, self::GILL => 'gi',
            self::CUP => 'cp',
            self::US_FLUID_OUNCE, self::FLUID_OUNCE => 'fl oz',
            self::TABLESPOON => 'Tbsp',
            self::TEASPOON => 'tsp',
            self::US_FLUID_DRAM, self::FLUID_DRAM => 'fl dr',
            self::FLUID_SCRUPLE => 'fl s',
            self::MINIM, self::US_MINIM => 'm',
        };
    }
}
