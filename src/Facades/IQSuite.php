<?php

namespace IQSuite\Platform\Facades;

use Illuminate\Support\Facades\Facade;

class IQSuite extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'iqsuite';
    }
}
