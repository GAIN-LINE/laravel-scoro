<?php

namespace Scoro\Facades;

use Illuminate\Support\Facades\Facade;

class Scoro extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Scoro\ScoroManager::class;
    }
}
