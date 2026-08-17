<?php

declare(strict_types=1);

namespace Modules\Home\app\Http\Services;

use App\Models\User;
use Modules\Menu\Models\Menu;
use Modules\Project\Models\Project;
use Modules\Services\Models\Service;
use Modules\Settings\app\Models\Setting;
use Modules\Slider\Models\Slider;

final class HomeService
{
    /**
     * @return array
     */
    public function getHomeData(): array
    {
        return [
            'headerMenus' => Menu::headerMenus()
                ->orderBy('sort_order', 'asc')
                ->get(),
            'footerMenus' => Menu::footerMenus()
                ->orderBy('sort_order', 'asc')
                ->get(),
            'sliders' => Slider::latest()
                ->limit(10)
                ->get(),
            'setting' => Setting::first(),
            'counters' => [
                'servicesCount' => Service::count(),
                'projectsCount' => Project::count(),
                'usersCount' => User::count(),
            ],
            'projects' => Project::with('images')
                ->latest()
                ->get(),
        ];
    }
}
