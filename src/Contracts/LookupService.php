<?php


namespace RicorocksDigitalAgency\GoingPostal\Contracts;


use Illuminate\Support\Collection;

interface LookupService
{

    public function lookup($postcode): Collection;

}
