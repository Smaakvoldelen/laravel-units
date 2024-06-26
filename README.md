![Unit conversions for Laravel Banner](https://banners.beyondco.de/Unit%20conversions%20for%20Laravel.png?theme=light&packageManager=composer+require&packageName=smaakvoldelen%2Flaravel-units&pattern=architect&style=style_1&description=Laravel+package+for+representing+and+converting+physical+units+of+measure.&md=1&showWatermark=1&fontSize=100px&images=https%3A%2F%2Flaravel.com%2Fimg%2Flogomark.min.svg)

# Unit conversions for Laravel

[![Latest Version on Packagist](https://img.shields.io/packagist/v/smaakvoldelen/laravel-units.svg?style=flat-square)](https://packagist.org/packages/smaakvoldelen/laravel-units)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/smaakvoldelen/laravel-units/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/smaakvoldelen/laravel-units/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/smaakvoldelen/laravel-units/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/smaakvoldelen/laravel-units/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/smaakvoldelen/laravel-units.svg?style=flat-square)](https://packagist.org/packages/smaakvoldelen/laravel-units)

This is a Laravel package for representing and converting physical units of measure.
The utility of this library is in encapsulating physical quantities in such a way that you don't have to keep track of 
which unit they're represented in.

## Installation

You can install the package via composer:

```bash
composer require smaakvoldelen/laravel-units
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="laravel-units-config"
```

## Usage

### Basic usage
```php
$unit = \Smaakvoldelen\Units\Facades\Units::from('1000 g');
echo $unit->toKg(); // 1000 g = 1 kg
echo $unit->toKilogram(); // 1000 g = 1 kg
echo $unit->toKilograms(); // 1000 g = 1 kg
```

### Eloquent casts

It's possible to cast a model attribute using a measure, depending on the framework version there are two ways to cast
model attributes.

```php
class Product extends \Illuminate\Database\Eloquent\Model {
    // Laravel 10 and below casts protected
    protected $casts = [
        'unit' => \Smaakvoldelen\Units\Unit\Unit::class
    ];

    // Laravel 11 casts method
    protected function casts(){
        return = [
            'unit' => \Smaakvoldelen\Units\Unit\Unit::class
        ];
    }
}
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Michael Beers](https://github.com/Smaakvoldelen)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
