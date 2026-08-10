<?php

declare(strict_types=1);

namespace Modules\Settings\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Modules\Settings\app\Models\Setting;
use Modules\Settings\Http\Requests\UpdateSettingsRequest;

class SettingsController extends Controller
{
    /**
     * @return View
     */

    public function index(): View
    {
        $setting = Setting::first();

        return view('settings::index', compact('setting'));
    }


    /**
     * @param UpdateSettingsRequest $request
     * @return RedirectResponse
     */

    public function updateOrCreate(UpdateSettingsRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $setting = Setting::first();

        if ($request->hasFile('logo_src')) {
            $data['logo_src'] = $request->file('logo_src')
                ->store('settings', 'public');
        }

        if ($request->hasFile('favicon')) {
            $data['favicon'] = $request->file('favicon')
                ->store('settings', 'public');
        }

        if ($request->hasFile('footer_logo')) {
            $data['footer_logo'] = $request->file('footer_logo')
                ->store('settings', 'public');
        }

        Setting::updateOrCreate(
            ['id' => ($setting->id ?? null)],
            $data
        );

        return redirect()->back()->with('messages.education_success');
    }
}
