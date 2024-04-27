<?php

namespace Smaakvoldelen\Units\Contracts;

use Illuminate\Support\Collection;

interface UnitOfMeasurement
{
    /**
     * Get the unit by the given alias name.
     */
    public static function alias(string $aliasName): self;

    /**
     * Get all the unit values.
     */
    public static function getAllValues(): Collection;

    /**
     * Get all the unit values translated.
     */
    public static function getAllValuesTranslated(): Collection;

    /**
     * Convert the given value to the given unit value.
     */
    public function convert(float $value, UnitOfMeasurement $unit): float;

    /**
     * Convert the given value from given the base units value.
     */
    public function convertFromBaseValue(float $value): float;

    /**
     * Convert the given value to the base units value.
     */
    public function convertToBaseValue(float $value): float;

    /**
     * Get the symbol of the unit.
     */
    public function getSymbol(): string;

    /**
     * Get the translated value of the unit.
     */
    public function getValueTranslated(): string;
}
