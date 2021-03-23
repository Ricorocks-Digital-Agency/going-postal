<?php


namespace RicorocksDigitalAgency\GoingPostal\Facades;


use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Facade;

/**
 * Class GoingPostal
 * @package RicorocksDigitalAgency\GoingPostal\Facades
 *
 * @method static Collection lookup($postcode)
 */
class GoingPostal extends Facade
{

    protected static function getFacadeAccessor()
    {
        return 'going-postal';
    }

}
