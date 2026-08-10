<?php

declare(strict_types=1);

namespace Modules\Slider\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Modules\Project\app\Http\Services\Inquiry\Drivers\ImageUploaderService;
use Modules\Project\app\Http\Services\Inquiry\FileUploaderInquiry;
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

        if ($request->hasFile('image')) {
            $upload = new FileUploaderInquiry(new ImageUploaderService());
            $imgName = $upload->upload($request->image, 'sliders', 'public');
            $data['image'] = $imgName;
        }

        Slider::create($data);

        return to_route('dashboard.sliders.index')
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

        if ($request->hasFile('image')) {
            $upload = new FileUploaderInquiry(new ImageUploaderService());
            $imgName = $upload->upload($request->image, 'sliders', 'public');
            $data['image'] = $imgName;
        } else {
            $data['image'] = $slider->image;
        }

        $slider->update($data);

        return to_route('dashboard.sliders.index')
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
        $slider->delete();

        return to_route('dashboard.sliders.index')
            ->with('success', __('messages.educationSuccess'));
    }
}
