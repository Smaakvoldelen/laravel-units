<?php

use Smaakvoldelen\Units\Unit\Mass\Mass;

it('can be converted to', function (string $from, string $to, string $expected) {
    $unit = Mass::from($from);

    expect($unit->to($to))
        ->and((string) $unit->to($to))
        ->toBe($expected);
})->with([
    ['2 g', 'kg', '0.002 kg'],
    ['2000 kg', 'tonne', '2 tonne'],
    ['2 kg', 'g', '2000 g'],
    ['2 g', 'oz', '0.0705 oz'],
    ['2 oz', 'g', '56.699 g'],
    ['2 kg', 'st', '0.3149 st'],
    ['2 kg', 'lb', '4.4092 lb'],
]);
