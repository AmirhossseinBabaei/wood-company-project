<?php

declare(strict_types=1);

namespace Modules\Services\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Modules\Services\Http\Requests\ServiceRequest;
use Modules\Services\Models\Service;

class ServiceController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        $services = Service::latest()
            ->paginate(10);

        return view('services::admin.index', compact('services'));
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return view('services::admin.create');
    }

    /**
     * @param Service $service
     * @return View
     */
    public function show(Service $service): View
    {
        return view('services::admin.show', compact('service'));
    }

    /**
     * @param Service $service
     * @return View
     */
    public function edit(Service $service): View
    {
        return view('services::admin.edit', compact('service'));
    }

    /**
     * @param ServiceRequest $request
     * @return RedirectResponse
     */
    public function store(ServiceRequest $request): RedirectResponse
    {
        $data = $request->validated();

        //Checking for the presence of an image in the request and if exists save in storage/services
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')
                ->store('services', 'public');
        }

        Service::create($data);

        return to_route((app()->getLocale() . '.dashboard.services.index'))
            ->with(
                'success',
                __('Services::words.success_create')
            );
    }

    /**
     * @param ServiceRequest $request
     * @param Service $service
     * @return RedirectResponse
     */
    public function update(ServiceRequest $request, Service $service): RedirectResponse
    {
        $data = $request->validated();

        //Checking for the presence of an image in the request and if exists save in storage/services
        if ($request->hasFile('image')) {

            //Destroy before image from storage/services
            if ($service->image) {
                Storage::disk('public')
                    ->delete($service->image);
            }

            $data['image'] = $request->file('image')
                ->store('services', 'public');
        }

        $service->update($data);

        return to_route((app()->getLocale() . '.dashboard.services.index'))
            ->with(
                'success',
                __('Services::words.success_update')
            );
    }

    /**
     * @param Service $service
     * @return RedirectResponse
     */
    public function destroy(Service $service): RedirectResponse
    {
        //Checking for the presence of an image in the request and if exists delete from storage/services
        if ($service->image) {
            Storage::disk('public')
                ->delete($service->image);
        }

        $service->delete();

        return to_route((app()->getLocale() . '.dashboard.services.index'))
            ->with(
                'success',
                __('Services::words.success_delete')
            );
    }
}
