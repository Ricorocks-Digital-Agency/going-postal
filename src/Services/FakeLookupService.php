<?php


namespace RicorocksDigitalAgency\GoingPostal\Services;


use Faker\Factory;
use Faker\Generator;
use Illuminate\Support\Collection;
use RicorocksDigitalAgency\GoingPostal\Address;
use RicorocksDigitalAgency\GoingPostal\Contracts\LookupService;

class FakeLookupService implements LookupService
{
    protected Generator $faker;
    protected $numberOfAddresses;

    public function __construct($numberOfAddresses = 5)
    {
        $this->faker = Factory::create();
        $this->numberOfAddresses = $numberOfAddresses;
    }

    public function lookup($postcode): Collection
    {
        return Collection::times($this->numberOfAddresses, function() use ($postcode) {
            return Address::make()
                ->line1($this->faker->streetAddress)
                ->line2($this->faker->streetName)
                ->city($this->faker->city)
                ->county($this->faker->state)
                ->country("United Kingdom")
                ->postcode($postcode);
        });
    }

    public function addressFor($identifier): Address
    {
        return Address::make()
            ->line1($this->faker->streetAddress)
            ->line2($this->faker->streetName)
            ->city($this->faker->city)
            ->county($this->faker->state)
            ->country("United Kingdom")
            ->postcode($this->faker->postcode);
    }
}
