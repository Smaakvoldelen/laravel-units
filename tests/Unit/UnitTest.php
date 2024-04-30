<?php

use Smaakvoldelen\Units\Casts\UnitCast;
use Smaakvoldelen\Units\Facades\Units;
use Smaakvoldelen\Units\Unit\Mass\Mass;
use Smaakvoldelen\Units\Unit\Unit;

it('can be coverted to using a magic method', function () {
    $unit = Mass::from('1 kg');

    expect($unit->toG()->value)->toBe(1000.0);
});

it('can get the real value', function () {
    $unit = Mass::from('1 kg');

    expect($unit->realValue())->toBe(1.0);
});

it('can be converted to array', function () {
    $unit = Mass::from('1 kg');

    expect($unit->toArray())
        ->toBeArray()
        ->toBe([
            'value' => 1.0,
            'symbol' => 'kg',
            'unit' => 'kilogram',
        ]);
});

it('can be converted to json', function () {
    $unit = Units::from('1 kg');

    $jsonOutput = '{"value":1,"symbol":"kg","unit":"kilogram"}';

    expect($unit->toJson())
        ->toBeString()
        ->toBe($jsonOutput)
        ->and(json_encode($unit))
        ->toBeString()
        ->toBe($jsonOutput);
});

it('can be formatted', function ($expression, $result, $resultWithDecimal) {
    $unit = Units::from($expression);

    expect($unit->format())
        ->toBeString()
        ->toBe($result)
        ->and($unit->format(2))
        ->toBeString()
        ->toBe($resultWithDecimal);
})->with([
    ['1 kg', '1 kg', '1.00 kg'],
    ['1 c', '1 °C', '1.00 °C'],
    ['1 l', '1 l', '1.00 l'],
    ['1 qty', '1 qty', '1.00 qty'],
]);

it('can be formatted translated', function ($expression, $result, $resultWithDecimal) {
    $unit = Units::from($expression);

    expect($unit->formatTranslated())
        ->toBeString()
        ->toBe($result)
        ->and($unit->formatTranslated(2))
        ->toBeString()
        ->toBe($resultWithDecimal);
})->with([
    ['1 kg', '1 kilogram', '1.00 kilogram'],
    ['2 kg', '2 kilograms', '2.00 kilograms'],
    ['1 c', '1 °C', '1.00 °C'],
    ['1 l', '1 liter', '1.00 liter'],
    ['1 qty', '1 piece', '1.00 piece'],
]);

it('throws and error when using an invalid rounding mode', function () {
    $unit = Mass::from('1 kg')->round(1, 1, 200);
})->throws(OutOfBoundsException::class, 'Rounding mode should be 1|2|3|4');

test('castUsing', function() {
   expect(Unit::castUsing([]))
   ->toEqual(UnitCast::class);
});
