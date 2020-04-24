<?php

namespace NotificationChannels\SMS77;

use GuzzleHttp\Client as HttpClient;
use Illuminate\Support\ServiceProvider;

class SMS77ServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->app->when(SMS77Channel::class)
            ->needs(SMS77::class)
            ->give(function () {
                $api_key = config('services.sms77.api_key');
                return new SMS77(
                    $api_key,
                    new HttpClient()
                );
            });
    }

    /**
     * Register the application services.
     */
    public function register()
    {
    }
}
