<?php


namespace RicorocksDigitalAgency\GoingPostal\Providers;


use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use RicorocksDigitalAgency\GoingPostal\Contracts\LookupService;
use RicorocksDigitalAgency\GoingPostal\GoingPostal;
use RicorocksDigitalAgency\GoingPostal\Services\FakeLookupService;
use \RicorocksDigitalAgency\GoingPostal\Http;

class GoingPostalServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->singleton('going-postal', GoingPostal::class);
        $this->app->bind(LookupService::class, $this->lookupService());
    }

    protected function lookupService()
    {
        $defaultService = config("going-postal.services.default");
        return $defaultService
            ? config("going-postal.services.drivers.$defaultService.class")
            : FakeLookupService::class;
    }

    public function boot()
    {
        $this->mergeConfigFrom(__DIR__ . '/../../config/going-postal.php', 'going-postal');

        if ($this->app->runningInConsole()) {
            $this->console();
        }
    }

    protected function console()
    {
        $this->publishes([__DIR__ . '/../../config' => config_path()], 'going-postal');
    }

}
