<?php

namespace Nikolag\Core\Facades;

use Illuminate\Support\Facades\Facade;

class CoreService extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'core-service';
    }
}
