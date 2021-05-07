<?php


namespace RicorocksDigitalAgency\GoingPostal\Http\Livewire\Traits;


use RicorocksDigitalAgency\GoingPostal\Facades\GoingPostal;

trait SearchesPostcodes
{
    public $postcode = '';
    public $addressIdentifier = null;

    public function searchPostcode()
    {
        $this->validate(['postcode' => 'required|max:10|min:4']);
        $results = GoingPostal::addressesIn($this->postcode);
        $this->emit('going-postal.addresses-received', $results->toArray());
        return $results;
    }

    public function retrieveAddress()
    {
        $this->validate(['addressIdentifier' => 'required']);
        $address = GoingPostal::addressFor($this->addressIdentifier);
        $this->emit('going-postal.address-received', $address->toArray());
        return $address;
    }

}
