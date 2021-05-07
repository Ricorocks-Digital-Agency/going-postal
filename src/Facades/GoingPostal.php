<?php


namespace RicorocksDigitalAgency\GoingPostal\Facades;


use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Facade;
use Illuminate\Contracts\Support\Arrayable;

/**
 * Class GoingPostal
 * @package RicorocksDigitalAgency\GoingPostal\Facades
 *
 * @method static Collection lookup($postcode) Return addresses for the given postcode
 * @method static Arrayable addressFor($identifier) Retrieve a single address from an identifier
 */
class GoingPostal extends Facade
{

    protected static function getFacadeAccessor()
    {
        return 'going-postal';
    }

}
