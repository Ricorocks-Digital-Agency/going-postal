<?php


namespace RicorocksDigitalAgency\GoingPostal;


use Illuminate\Support\Fluent;

/**
 * Class Address
 * @package RicorocksDigitalAgency\GoingPostal
 *
 * @property ?string line1
 * @property ?string line2
 * @property ?string line3
 * @property ?string city
 * @property ?string county
 * @property ?string country
 * @property ?string postcode
 */
class Address extends Fluent
{

    public static function make()
    {
        return resolve(static::class);
    }

}
