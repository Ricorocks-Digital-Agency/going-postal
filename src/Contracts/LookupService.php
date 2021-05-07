<?php


namespace RicorocksDigitalAgency\GoingPostal\Contracts;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Collection;

interface LookupService
{

    public function lookup($postcode): Collection;

    public function addressFor($identifier): Arrayable;

}
