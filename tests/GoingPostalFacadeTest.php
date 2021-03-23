<?php


namespace RicorocksDigitalAgency\GoingPostal\Tests;


use Illuminate\Foundation\Testing\WithFaker;
use RicorocksDigitalAgency\GoingPostal\Address;
use RicorocksDigitalAgency\GoingPostal\Facades\GoingPostal;

class GoingPostalFacadeTest extends TestCase
{
    use WithFaker;

    /** @test */
    public function it_can_lookup_a_given_postcode()
    {
        $results = GoingPostal::lookup($this->faker->postcode);

        expect($results)->toHaveCount(5);
        $results->each(fn($result) => expect($result)->toBeInstanceOf(Address::class));
    }

}
