<?php

namespace Smaakvoldelen\Units\Unit\Concerns;

use Illuminate\Support\Collection;

trait HasValues
{
    /**
     * Get all the unit values.
     *
     * @codeCoverageIgnore
     */
    public static function getAllValues(): Collection
    {
        return collect(array_column(self::cases(), 'value'));
    }

    /**
     * Get all the unit values translated.
     *
     * @codeCoverageIgnore
     */
    public static function getAllValuesTranslated(): Collection
    {
        return collect(self::cases())
            ->mapWithKeys(fn ($case, $key) => [$case->value => $case->getValueTranslated()]);
    }

    /**
     * Get the translated value of the unit.
     */
    public function getValueTranslated(): string
    {
        return __('units::units.'.$this->value);
    }
}
