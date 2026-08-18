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
            //header menus for show into header
            'headerMenus' => Menu::headerMenus()
                ->orderBy('sort_order')
                ->get(),

            //header menus for show into footer
            'footerMenus' => Menu::footerMenus()
                ->orderBy('sort_order')
                ->get(),

            //slider images for show into slider component
            'sliders' => Slider::latest()
                ->take(10)
                ->get(),

            //setting record for show into page
            'setting' => Setting::first(),

            //counters integers for show into statistics component
            'counters' => [
                'servicesCount' => Service::count(),
                'projectsCount' => Project::count(),
                'usersCount' => User::count(),
            ],

            //projects for show into project component
            'projects' => Project::with('images')
                ->latest()
                ->get(),
        ];
    }
}
