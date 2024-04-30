<?php

use Smaakvoldelen\Units\Facades\Units;
use Smaakvoldelen\Units\Unit\Unit;

it('can get any unit from a given expression', function ($expression) {
    expect(Units::from($expression))
        ->toBeInstanceOf(Unit::class);
})->with([
    '1 g',
    '1 c',
    '1 l',
    '1 kg',
]);

it('return null on invalid expression', function () {
    expect(Units::from('invalid'))
        ->toBeNull();
});
