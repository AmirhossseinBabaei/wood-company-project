<?php

declare(strict_types=1);

namespace Modules\Project\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Modules\Project\Http\Requests\ProperyRequest;
use Modules\Project\Models\Property;

class PropertyController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        $properties = Property::latest()
            ->paginate(10);

        return view('project::admin.properties.index', compact('properties'));
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return view('project::admin.properties.create');
    }

    /**
     * @param ProperyRequest $request
     * @return RedirectResponse
     */
    public function store(ProperyRequest $request): RedirectResponse
    {
        Property::create($request->validated());

        return to_route((app()->getLocale() . '.dashboard.properties.index'))
            ->with('success', __('messages.education_success'));
    }

    /**
     * @param Property $property
     * @return View
     */
    public function edit(Property $property): View
    {
        return view('project::admin.properties.edit', compact('property'));
    }

    /**
     * @param ProperyRequest $request
     * @param Property $property
     * @return RedirectResponse
     */
    public function update(ProperyRequest $request, Property $property): RedirectResponse
    {
        $property->update($request->validated());

        return to_route((app()->getLocale() . '.dashboard.properties.index'))
            ->with('success', __('messages.education_success'));
    }

    /**
     * @param Property $property
     * @return RedirectResponse
     */
    public function destroy(Property $property): RedirectResponse
    {
        $property->delete();

        return to_route((app()->getLocale() . '.dashboard.properties.index'))
            ->with('success', __('messages.education_success'));
    }
}
