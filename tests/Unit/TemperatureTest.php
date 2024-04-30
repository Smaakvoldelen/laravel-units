<?php

use Smaakvoldelen\Units\Unit\Temperature\Temperature;

it('can be converted to', function (string $from, string $to, string $expected) {
    $unit = Temperature::from($from);

    expect($unit->to($to))
        ->and((string) $unit->to($to))
        ->toBe($expected);
})->with([
    ['2 C', 'K', '546.3 kelvin'],
    ['273.15 K', 'C', '1 celsius'],
]);
