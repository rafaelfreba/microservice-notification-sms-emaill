<?php

namespace App\Providers;

use App\Services\SMS\Providers\OtimaProvider;
use App\Services\SMS\SmsServiceInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        /**
         * Singleton for when fetching the interface returns the class implementation
         */
        $this->app->singleton(SmsServiceInterface::class, function($app){
            //looking for credentials in the .env file
            $user = config('services.sms.user');
            $password = config('services.sms.password');
            $url = config('services.sms.url');

            return new OtimaProvider($user, $password, $url);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
