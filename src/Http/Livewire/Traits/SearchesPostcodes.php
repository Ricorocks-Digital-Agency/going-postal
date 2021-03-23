<?php


namespace RicorocksDigitalAgency\GoingPostal\Http\Livewire\Traits;


use RicorocksDigitalAgency\GoingPostal\Facades\GoingPostal;

trait SearchesPostcodes
{
    public $postcode = '';

    public function searchPostcode()
    {
        $this->validate(['postcode' => 'required|max:10|min:4']);
        $results = GoingPostal::lookup($this->postcode);
        $this->emit('going-postal.addresses-received', $results->toArray());
    }

}
