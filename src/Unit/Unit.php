<?php

namespace Smaakvoldelen\Units\Unit;

use BackedEnum;
use BadMethodCallException;
use Illuminate\Support\Str;
use Smaakvoldelen\Units\Contracts\UnitOfMeasurement;

abstract class Unit
{
    /**
     * The unit of measurement class that will be used by the unit.
     */
    public static string $unitOfMeasurementClass = UnitOfMeasurement::class;

    /**
     * Keeps track of the real value;
     */
    private float $realValue;

    /**
     * Extract the value from the given expression.
     */
    public static function extractValue(string $expression): ?string
    {
        $results = Str::of($expression)
            ->trim()
            ->explode(' ')
            ->first();

        if (Str::of($results)->length() === Str::of($expression)->length()) {
            return Str::of($expression)->match('/[\d.+]+/')->value();
        }

        return $results;
    }

    /**
     * Get the value and unit from the given expression.
     */
    public static function getValueAndUnit(string $expression): array
    {
        $value = static::extractValue($expression);
        $expression = Str::remove((string) $value, $expression);

        $unit = static::detectUnitOfMeasurement($expression);
        if ($unit === null) {
            throw new BadMethodCallException('Invalid unit.');
        }

        return [(float) $value, $unit];
    }

    /**
     * Detect the unit of measurement from the given expression.
     */
    public static function detectUnitOfMeasurement(string $expression): ?UnitOfMeasurement
    {
        $unit = null;
        if (! empty($expression)) {
            $expression = Str::of($expression)->trim()->lower()->squish()->value();

            /** @var BackedEnum $unitClass */
            $unitClass = static::$unitOfMeasurementClass;

            /** @var UnitOfMeasurement|null $unit */
            $unit = $unitClass::tryFrom($expression);

            if (! $unit) {
                /** @var UnitOfMeasurement|null $unitClass */
                $unitClass = static::$unitOfMeasurementClass;

                $unit = $unitClass::alias($expression);
            }
        }

        /** @var UnitOfMeasurement|null $unit */
        return $unit;
    }

    public static function from(string $expression): static
    {
        $expression = Str::of($expression)
            ->squish()
            ->value();

        [$value, $unit] = static::getValueAndUnit($expression);

        return new static($value, $unit);
    }

    /**
     * Construct a new unit.
     */
    final public function __construct(public float $value, public UnitOfMeasurement $unitOfMeasurement)
    {
        $this->realValue = $value;
    }

    /**
     * String representation of the object.
     */
    public function __toString(): string
    {
        return trim($this->value.' '.$this->unitOfMeasurement->getSymbol());
    }

    /**
     * Magic call method of the object.
     */
    public function __call(string $name, array $arguments): static
    {
        if (Str::startsWith($name, 'to')) {
            $unit = Str::of($name)
                ->after('to')
                ->lower()
                ->value();

            return $this->to($unit);
        }

        throw new BadMethodCallException("Method $name does not exist.");
    }

    /**
     * Get the real value.
     */
    public function realValue(): float
    {
        return $this->realValue;
    }

    public function unitOfMeasurementClass(): string
    {
        return static::$unitOfMeasurementClass;
    }

    /**
     * Convert the unit to the given destination unit.
     */
    public function to(string|UnitOfMeasurement $destination): static
    {
        if (is_string($destination)) {
            $destination = static::detectUnitOfMeasurement($destination);
        }

        if ($destination === null) {
            throw new BadMethodCallException('Invalid unit.');
        }

        $convertedValue = $this->unitOfMeasurement->convert($this->value, $destination);

        $this->realValue = $convertedValue;
        $this->value = round($convertedValue, 4); // TODO: Precision should be configurable
        $this->unitOfMeasurement = $destination;

        return $this;
    }
}
