<?php

namespace Smaakvoldelen\Units\Unit;

use BackedEnum;
use BadMethodCallException;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;
use Illuminate\Support\Str;
use JsonSerializable;
use OutOfBoundsException;
use Smaakvoldelen\Units\Contracts\UnitOfMeasurement;

abstract class Unit implements Arrayable, Jsonable, JsonSerializable
{
    const ROUND_HALF_UP = PHP_ROUND_HALF_UP;

    const ROUND_HALF_DOWN = PHP_ROUND_HALF_DOWN;

    const ROUND_HALF_EVEN = PHP_ROUND_HALF_EVEN;

    const ROUND_HALF_ODD = PHP_ROUND_HALF_ODD;

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
     * Specify data which should be serialized to JSON.
     */
    public function jsonSerialize(): array
    {
        return $this->toArray();
    }

    /**
     * Get the real value.
     */
    public function realValue(): float
    {
        return $this->realValue;
    }

    /**
     * Round the given value.
     */
    public function round(int|float $value, ?int $precision = null, $mode = self::ROUND_HALF_UP): float
    {
        $this->assertRoundingMode($mode);

        return round($value, $precision ?? config('units.precision', 4), $mode);
    }

    /**
     * Get the unit of measurement class.
     */
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
        $this->value = $this->round($convertedValue);
        $this->unitOfMeasurement = $destination;

        return $this;
    }

    /**
     * Get the instance as an array.
     */
    public function toArray(): array
    {
        return [
            'value' => $this->value,
            'symbol' => $this->unitOfMeasurement->getSymbol(),
            'unit' => $this->unitOfMeasurement->getValueTranslated(),
        ];
    }

    /**
     * Convert the object to its JSON representation.
     */
    public function toJson($options = 0): false|string
    {
        return json_encode($this->toArray(), $options);
    }

    /**
     * Assert that the given rounding mode is valid.
     */
    protected function assertRoundingMode(int $mode): void
    {
        $modes = [self::ROUND_HALF_UP, self::ROUND_HALF_DOWN, self::ROUND_HALF_EVEN, self::ROUND_HALF_ODD];
        if (! in_array($mode, $modes)) {
            throw new OutOfBoundsException('Rounding mode should be '.implode(' | ', $modes));
        }
    }
}
