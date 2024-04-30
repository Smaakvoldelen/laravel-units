<?php

use Smaakvoldelen\Units\Unit\Amount\Amount;

it('can be converted to', function (string $from, string $to, string $expected) {
    $unit = Amount::from($from);

    expect($unit->to($to))
        ->and((string) $unit->to($to))
        ->toBe($expected);
})->with([
    ['2 qty', 'qty', '2 qty'],
]);
