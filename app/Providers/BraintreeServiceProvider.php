<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class BraintreeServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
      \Braintree_Configuration::environment('sandbox');
      \Braintree_Configuration::merchantId('fyz787jbftwstf55');
      \Braintree_Configuration::publicKey('hzr9jgvqjhg2s2wz');
      \Braintree_Configuration::privateKey('c4576e65bd119c414574e54b33e4cf24');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
