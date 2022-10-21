<?php

namespace App\Providers;

use Laravel\Passport\Token;

use Laravel\Passport\Client;
use Laravel\Passport\AuthCode;
use Laravel\Passport\Passport;
use Illuminate\Support\ServiceProvider;
use Laravel\Passport\PersonalAccessClient;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        // Passport::useTokenModel(Token::class); 
        // Passport::useClientModel(Client::class); 
        // Passport::useAuthCodeModel(AuthCode::class); 
        // Passport::usePersonalAccessClientModel(PersonalAccessClient::class);

        
    }
}
