<?php

declare(strict_types=1);

namespace Modules\Slider\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Modules\Slider\Http\Requests\SliderRequest;
use Modules\Slider\Models\Slider;

class SliderController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        $sliders = Slider::latest()
            ->paginate(10);

        return view('slider::index', compact('sliders'));
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return view('slider::create');
    }

    /**
     * @param SliderRequest $request
     * @return RedirectResponse
     */
    public function store(SliderRequest $request): RedirectResponse
    {
        $data = $request->validated();

        //Checking for the presence of an image in the request and if exists save in storage/sliders
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('public', 'sliders');
        }

        Slider::create($data);

        return to_route((app()->getLocale() . '.dashboard.sliders.index'))
            ->with('success', __('messages.educationSuccess'));
    }

    /**
     * @param Slider $slider
     * @return View
     */
    public function edit(Slider $slider): View
    {
        return view('slider::edit', compact('slider'));
    }

    /**
     * @param SliderRequest $request
     * @param Slider $slider
     * @return RedirectResponse
     */
    public function update(SliderRequest $request, Slider $slider): RedirectResponse
    {
        $data = $request->validated();

        //Checking for the presence of an image in the request and if exists save in storage/sliders
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('public', 'sliders');
        }

        $slider->update($data);

        return to_route((app()->getLocale() . '.dashboard.sliders.index'))
            ->with('success', __('messages.educationSuccess'));
    }

    /**
     * @param Slider $slider
     * @return View
     */
    public function show(Slider $slider): View
    {
        return view('slider::show', compact('slider'));
    }

    /**
     * @param Slider $slider
     * @return RedirectResponse
     */
    public function destroy(Slider $slider): RedirectResponse
    {
        //Checking for the presence of an image in the request and if exists delete from storage/sliders
        if ($slider->image) {
            Storage::disk('public')
                ->delete($slider->image);
        }

        $slider->delete();

        return to_route((app()->getLocale() . '.dashboard.sliders.index'))
            ->with('success', __('messages.educationSuccess'));
    }
}
