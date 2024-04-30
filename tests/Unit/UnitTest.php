<?php

use Smaakvoldelen\Units\Unit\Mass\Mass;

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
    $unit = Mass::from('1 kg');

    $jsonOutput = '{"value":1,"symbol":"kg","unit":"kilogram"}';

    expect($unit->toJson())
        ->toBeString()
        ->toBe($jsonOutput)
        ->and(json_encode($unit))
        ->toBeString()
        ->toBe($jsonOutput);
});

it('throws and error when using an invalid rounding mode', function() {
    $unit = Mass::from('1 kg')->round(1,1,200);
})->throws(OutOfBoundsException::class, 'Rounding mode should be 1|2|3|4');
