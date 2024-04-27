<?php

namespace Smaakvoldelen\Units;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class UnitsServiceProvider extends PackageServiceProvider
{
    /**
     * Configure the package.
     */
    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-units')
            ->hasConfigFile()
            ->hasTranslations();
    }
}
