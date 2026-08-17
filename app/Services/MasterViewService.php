<?php

declare(strict_types=1);

namespace App\Services;

use Modules\Menu\Models\Menu;
use Modules\Settings\app\Models\Setting;

final class MasterViewService
{
    /**
     * @return array
     */
    public function getMasterViewData(): array
    {
        return [
            'headerMenus' => Menu::orderBy('sort_order')
                ->headerMenus()
                ->get(),
            'footerMenus' => Menu::orderBy('sort_order')
                ->footerMenus()
                ->get(),
            'setting' => Setting::first(),
        ];
    }
}
