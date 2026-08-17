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
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $galleries = Gallery::orderBy('sort_order')
            ->orderByDesc('id')
            ->paginate(10);

        return view('gallery::admin.index', compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('gallery::admin.create');
    }

    /**
     * Store a newly created resource.
     */
    public function store(GalleryRequest $request): RedirectResponse
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')
                ->store('gallery', 'public');
        }

        Gallery::create($data);

        return to_route((app()->getLocale() . '.dashboard.galleries.index'))
            ->with('success', __('messages.education_success'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Gallery $gallery): View
    {
        return view('gallery::admin.show', compact('gallery'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gallery $gallery): View
    {
        return view('gallery::admin.edit', compact('gallery'));
    }

    /**
     * Update the specified resource.
     */
    public function update(GalleryRequest $request, Gallery $gallery): RedirectResponse
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {

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
     * Remove the specified resource.
     */
    public function destroy(Gallery $gallery): RedirectResponse
    {
        if ($gallery->image && Storage::disk('public')->exists($gallery->image)) {
            Storage::disk('public')->delete($gallery->image);
        }

        $gallery->delete();

        return to_route((app()->getLocale() . '.dashboard.galleries.index'))
            ->with('success', __('messages.education_success'));
    }
}
