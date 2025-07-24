<?php

namespace Scoro;

use Illuminate\Support\ServiceProvider;
use Scoro\Sdk\Configuration;

class ScoroServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../../config/scoro.php', 'scoro');

        // Bind Configuration singleton
        $this->app->singleton(Configuration::class, function () {
            $config = new Configuration();
            $config->setHost(config('scoro.host'));
            $config->setAccessToken(trim(config('scoro.token')));
            $config->setCompanyAccountID(config('scoro.company_account_id'));
            return $config;
        });

        // Bind ScoroManager
        $this->app->singleton(ScoroManager::class, function ($app) {
            return new ScoroManager($app->make(Configuration::class));
        });
    }

    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../../config/scoro.php' => config_path('scoro.php'),
        ], 'config');
    }
}
