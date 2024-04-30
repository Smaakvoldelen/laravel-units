<?php

namespace Smaakvoldelen\Units\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Database\Eloquent\Model;
use Smaakvoldelen\Units\Facades\Units;
use Smaakvoldelen\Units\Unit\Unit;
use UnexpectedValueException;

/**
 * @template-implements CastsAttributes<Unit, Unit>
 */
class UnitCast implements CastsAttributes
{
    public function get(Model $model, string $key, mixed $value, array $attributes): Unit
    {
        if (! is_string($value)) {
            throw new UnexpectedValueException;
        }

        return Units::from($value);
    }

    public function set(Model $model, string $key, mixed $value, array $attributes): string
    {
        if (! $value instanceof Unit) {
            throw new UnexpectedValueException;
        }

        return (string) $value;
    }
}
