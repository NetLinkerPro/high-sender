<?php

namespace NetLinker\HighSender\Facades;

use Illuminate\Support\Facades\Facade;

class HighSender extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'high-sender';
    }
}
