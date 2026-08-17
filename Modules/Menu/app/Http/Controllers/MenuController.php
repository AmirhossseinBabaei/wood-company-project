<?php

declare(strict_types=1);

namespace Modules\Menu\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Modules\Menu\Http\Requests\MenuRequest;
use Modules\Menu\Models\Menu;

class MenuController extends Controller
{

    /**
     * @return View
     */
    public function index(): View
    {
        $menus = Menu::latest()
            ->paginate(10);
        return view('menu::index', compact('menus'));
    }

    /**
     * @return View
     */
    public function create(): View
    {
        $menus = Menu::all();

        return view('menu::create', compact('menus'));
    }

    public function store(MenuRequest $request)
    {
        Menu::create($request->validated());

        return to_route((app()->getLocale() . '.dashboard.menus.index'))
            ->with('success', __('messages.education_success'));
    }

    /**
     * @param Menu $menu
     * @return View
     */
    public function show(Menu $menu): View
    {
        return view('menu::show', compact('menu'));
    }

    /**
     * @param Menu $menu
     * @return View
     */
    public function edit(Menu $menu): View
    {
        $menus = Menu::all();

        return view('menu::edit', compact('menus', 'menu'));
    }

    /**
     * @param MenuRequest $request
     * @param Menu $menu
     * @return RedirectResponse
     */
    public function update(MenuRequest $request, Menu $menu): RedirectResponse
    {
        $menu->update($request->validated());

        return to_route((app()->getLocale() .'.dashboard.menus.index'))
            ->with('success', __('messages.education_success'));
    }

    /**
     * @param Menu $menu
     * @return RedirectResponse
     */
    public function destroy(Menu $menu): RedirectResponse
    {
        $menu->delete();

        return to_route((app()->getLocale() .'.dashboard.menus.index'))
            ->with('success', __('messages.education_success'));
    }
}
