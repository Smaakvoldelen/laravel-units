<?php

use Smaakvoldelen\Units\Unit\Volume\Volume;

it('can be converted to', function (string $from, string $to, string $expected) {
    $unit = Volume::from($from);

    expect($unit->to($to))
        ->and((string) $unit->to($to))
        ->toBe($expected);
})->with([
    ['2 l', 'kl', '0.002 kl'],
]);
