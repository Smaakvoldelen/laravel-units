<?php

use Illuminate\Database\Eloquent\Model;
use Smaakvoldelen\Units\Casts\UnitCast;
use Smaakvoldelen\Units\Unit\Mass\Mass;

beforeEach(function () {
    $this->model = $this->getMockBuilder(Model::class)
        ->disableOriginalConstructor()
        ->getMock();
});

it('get unit', function ($expression) {
    expect((new UnitCast)->get($this->model, 'unit', $expression, []))
        ->toEqual(Mass::from($expression));
})->with([
    '1 gram',
    '1 kilogram',
    '1 ounce',
    '1.5 stone',
]);

it('set unit', function ($expression) {
    $unit = Mass::from($expression);

    expect((new UnitCast())->set($this->model, 'unit', $unit, []))
        ->toBe($expression);
})->with([
    '1 gram',
    '1 kilogram',
    '1 ounce',
    '1.5 stone',
]);

it('throws exception on getting an unexpected value', function () {
    (new UnitCast())->get($this->model, 'unit', [], []);
})->throws(UnexpectedValueException::class);

it('throws exception on setting an unexpected value', function () {
    (new UnitCast())->set($this->model, 'unit', 'foo', []);
})->throws(UnexpectedValueException::class);
