<?php


namespace RicorocksDigitalAgency\GoingPostal\Contracts;


use Illuminate\Support\Collection;
use RicorocksDigitalAgency\GoingPostal\Address;

interface LookupService
{

    public function addressesIn($postcode): Collection;

    public function addressFor($identifier): Address;

}
