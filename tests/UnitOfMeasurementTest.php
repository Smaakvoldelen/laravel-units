<?php

use Smaakvoldelen\Units\Unit\Mass\Mass;

it('throws an exception for a bad method call', function () {
    $unit = Mass::from('1 g');
    $unit->nonExistingMethod();
})->throws(BadMethodCallException::class, 'Method nonExistingMethod does not exist.');

it('can return the name of the unit of measurement class', function () {
    $unit = Mass::from('1 g');
    expect($unit->unitOfMeasurementClass())->toBe(\Smaakvoldelen\Units\Unit\Mass\MassUnitOfMeasurement::class);
});

it('throws an exception if a unit is not detected', function () {
    Mass::from('100');
})->throws(BadMethodCallException::class, 'Invalid unit.');

it('throws an exception if a destination unit of measurement is not detected', function () {
    Mass::from('100g')->to('');
})->throws(BadMethodCallException::class, 'Invalid unit.');
