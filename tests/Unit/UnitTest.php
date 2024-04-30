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
