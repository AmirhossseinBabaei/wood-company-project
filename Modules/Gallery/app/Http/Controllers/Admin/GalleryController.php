<?php

declare(strict_types=1);

namespace Modules\Gallery\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Modules\Gallery\app\Models\Gallery;
use Modules\Gallery\Http\Requests\GalleryRequest;

class GalleryController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        $galleries = Gallery::latest()
            ->paginate(10);

        return view('gallery::admin.index', compact('galleries'));
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return view('gallery::admin.create');
    }

    /**
     * @param GalleryRequest $request
     * @return RedirectResponse
     */
    public function store(GalleryRequest $request): RedirectResponse
    {
        $data = $request->validated();

        //Checking for the presence of an image in the request and if exists save in storage/gallery
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')
                ->store('gallery', 'public');
        }

        Gallery::create($data);

        return to_route((app()->getLocale() . '.dashboard.galleries.index'))
            ->with('success', __('messages.education_success'));
    }

    /**
     * @param Gallery $gallery
     * @return View
     */
    public function show(Gallery $gallery): View
    {
        return view('gallery::admin.show', compact('gallery'));
    }

    /**
     * @param Gallery $gallery
     * @return View
     */
    public function edit(Gallery $gallery): View
    {
        return view('gallery::admin.edit', compact('gallery'));
    }

    /**
     * @param GalleryRequest $request
     * @param Gallery $gallery
     * @return RedirectResponse
     */
    public function update(GalleryRequest $request, Gallery $gallery): RedirectResponse
    {
        $data = $request->validated();

        //Checking for the presence of an image in the request and if exists save in storage/gallery
        if ($request->hasFile('image')) {

            //Checking exists file in the disk and delete it
            if ($gallery->image && Storage::disk('public')->exists($gallery->image)) {
                Storage::disk('public')->delete($gallery->image);
            }

            $data['image'] = $request->file('image')
                ->store('gallery', 'public');
        }

        $gallery->update($data);

        return to_route((app()->getLocale() . '.dashboard.galleries.index'))
            ->with('success', __('messages.education_success'));
    }

    /**
     * @param Gallery $gallery
     * @return RedirectResponse
     */
    public function destroy(Gallery $gallery): RedirectResponse
    {
        //Checking exists file in the disk and delete it
        if ($gallery->image && Storage::disk('public')->exists($gallery->image)) {
            Storage::disk('public')->delete($gallery->image);
        }

        $gallery->delete();

        return to_route((app()->getLocale() . '.dashboard.galleries.index'))
            ->with('success', __('messages.education_success'));
    }
}
