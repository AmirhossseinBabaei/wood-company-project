<?php

namespace Modules\Slider\Providers;

use Illuminate\Support\ServiceProvider;

class LangServiceProvider extends ServiceProvider
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

    public function boot(): void
    {
        $this->loadTranslationsFrom(
            module_path('Slider', 'Resources/lang'),
            'Slider'
        );
    }
}
