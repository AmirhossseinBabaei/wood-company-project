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
    public function index(): View
    {
        $services = Service::orderBy('id', 'desc')->paginate(10);

        return view('services::admin.index', compact('services'));
    }

    public function create(): View
    {
        return view('services::admin.create');
    }

    public function show(Service $service): View
    {
        return view('services::admin.show', compact('service'));
    }

    public function edit(Service $service): View
    {
        return view('services::admin.edit', compact('service'));
    }

    public function store(ServiceRequest $request): RedirectResponse
    {
        $data = $request->validated();

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


    public function update(
        ServiceRequest $request,
        Service $service
    ): RedirectResponse {

        $data = $request->validated();


        if ($request->hasFile('image')) {


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


    public function destroy(Service $service): RedirectResponse
    {

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
