<?php
namespace Slotgen\SpaceMan;

use Illuminate\Support\Facades\Facade;

class SpaceManFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'slotgen-space_man';
    }
}
