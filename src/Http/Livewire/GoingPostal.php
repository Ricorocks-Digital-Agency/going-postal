<?php


namespace RicorocksDigitalAgency\GoingPostal\Http\Livewire;


use Livewire\Component;
use RicorocksDigitalAgency\GoingPostal\Facades;

class GoingPostal extends Component
{
    public $postcode = '';
    public $className;
    public $inputClass;
    public $buttonClass;
    public $buttonText;

    public function mount($class = '', $inputClass = '', $buttonClass = '', $buttonText = 'Search')
    {
        $this->className = $class;
        $this->inputClass = $inputClass;
        $this->buttonClass = $buttonClass;
        $this->buttonText = $buttonText;
    }

    public function search()
    {
        $this->validate(['postcode' => 'required|max:10|min:4']);
        $results = Facades\GoingPostal::lookup($this->postcode);
        $this->emit('going-postal.addresses-received', $results->toArray());
    }

    public function render()
    {
        return <<<'blade'
            <div class="{{ $this->className }}">
                <input wire:model.defer="postcode" class="{{ $this->inputClass }}" type="text"/>
                <button wire:click="search" wire:loading.attr="disabled" wire:target="search" type="button" class="{{ $this->buttonClass }}">{{ $this->buttonText }}</button>
            </div>
        blade;
    }

}
