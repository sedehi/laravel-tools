<?php

namespace Sedehi\LaravelTools\Facades;

use Illuminate\Support\Facades\Facade;

class LaravelTools extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'laravel-tools';
    }
}
