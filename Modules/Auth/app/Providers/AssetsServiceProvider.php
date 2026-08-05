<?php

namespace Modules\Auth\Providers;

use Illuminate\Support\ServiceProvider;

class AssetsServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     */
    public function register(): void {}

    /**
     * Get the services provided by the provider.
     */
    public function provides(): array
    {
        return [];
    }

    public function boot(){
        $this->publishes([
            module_path('Auth', 'Resources/assets')
            => public_path('modules/auth'),
        ], 'auth-assets');
    }
}
