<?php namespace Vatsim\Xml\Facades;

use Illuminate\Support\Facades\Facade;

class XML extends Facade {

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return 'vatsimxml'; }

}