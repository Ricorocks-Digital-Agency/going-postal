<?php


namespace RicorocksDigitalAgency\GoingPostal;


use RicorocksDigitalAgency\GoingPostal\Contracts\LookupService;

class GoingPostal
{
    public function __construct(protected LookupService $lookupService)
    {
    }

    public function addressesIn($postcode)
    {
        return $this->lookupService->addressesIn($postcode);
    }

    public function addressFor($identifier)
    {
        return $this->lookupService->addressFor($identifier);
    }

}
