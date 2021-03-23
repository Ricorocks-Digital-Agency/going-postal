<?php


namespace RicorocksDigitalAgency\GoingPostal\Tests\Livewire;


use Illuminate\Support\Collection;
use Livewire\Livewire;
use RicorocksDigitalAgency\GoingPostal\Address;
use RicorocksDigitalAgency\GoingPostal\Facades\GoingPostal;
use RicorocksDigitalAgency\GoingPostal\Tests\TestCase;

class GoingPostalComponentTest extends TestCase
{

    /** @test */
    public function it_calls_on_the_service_with_the_given_postcode()
    {
        GoingPostal::shouldReceive('lookup')
            ->once()
            ->with('foobar')
            ->andReturn(collect());

        static::livewire()->set('postcode', 'foobar')->call('search');
    }

    protected static function livewire()
    {
        return Livewire::test(\RicorocksDigitalAgency\GoingPostal\Http\Livewire\GoingPostal::class);
    }

    /** @test */
    public function the_postcode_must_be_valid()
    {
        static::livewire()
            ->set('postcode', '')
            ->call('search')
            ->assertHasErrors('postcode')
            ->set('postcode', 'S35')
            ->call('search')
            ->assertHasErrors('postcode')
            ->set('postcode', 'S359adadwadwda')
            ->call('search')
            ->assertHasErrors('postcode')
            ->set('postcode', 'T35 T1NG')
            ->call('search')
            ->assertHasNoErrors();
    }

    /** @test */
    public function it_emits_an_event_with_the_returned_address_details()
    {
        $payload = [
            Address::make()->line1('Foo')->line2('Bar')->city('Baz')->county('Blah')->postcode('Foobar')->toArray(),
        ];

        GoingPostal::shouldReceive('lookup')->andReturn(Collection::wrap($payload));

        static::livewire()
            ->set('postcode', 'Foobar')
            ->call('search')
            ->assertEmitted('going-postal.addresses-received', $payload);
    }

}
