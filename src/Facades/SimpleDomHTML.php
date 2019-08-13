<?php

namespace Plum\SimpleDomHTML\Facades;

use Illuminate\Support\Facades\Facade;

class SimpleDomHTML extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'simpledomhtml';
    }
}
