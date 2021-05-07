<?php


namespace RicorocksDigitalAgency\GoingPostal;


use RicorocksDigitalAgency\GoingPostal\Contracts\LookupService;

class GoingPostal
{
    public function __construct(protected LookupService $lookupService)
    {
    }

    public function lookup($postcode)
    {
        return $this->lookupService->lookup($postcode);
    }

    public function addressFor($identifier)
    {
        return $this->lookupService->addressFor($identifier);
    }

}
