<?php

namespace Modules\Project\Providers;

use App\Services\MasterViewService;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     */
    public function register(): void
    {
    }

    /**
     * Get the services provided by the provider.
     */
    public function provides(): array
    {
        return [];
    }

    public function boot(MasterViewService $service)
    {
        $data = $service->getMasterViewData();

        View::composer(['project::front.projects', 'project::front.show'], function ($view) use ($data) {
            $view->with('data', $data);
        });
    }
}
