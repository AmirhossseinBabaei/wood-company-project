<?php

namespace App\Livewire;

use App\Models\Gallery;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

#[Layout('components.layouts.dashboard')]
class GalleryManagement extends Component
{
    use WithPagination, WithFileUploads;

    public $galleryId = null;

    public $fa_title = '';
    public $en_title = '';

    public $fa_description = '';
    public $en_description = '';

    public $image;

    public $sort_order = 0;

    public $status = 'active';

    public $currentImage = null;

    public $showModal = false;

    public $search = '';

    protected function rules()
    {
        return [

            'fa_title' => 'required|string|max:255',

            'en_title' => 'required|string|max:255',

            'fa_description' => 'nullable|string',

            'en_description' => 'nullable|string',

            'image' => $this->galleryId
                ? 'nullable|image|max:2048'
                : 'required|image|max:2048',

            'sort_order' => 'required|integer|min:0',

            'status' => 'required|in:active,inactive',

        ];
    }

    public function create()
    {
        $this->resetForm();

        $this->showModal = true;
    }

    public function edit($id)
    {
        $gallery = Gallery::findOrFail($id);

        $this->galleryId = $gallery->id;

        $this->fa_title = $gallery->fa_title;
        $this->en_title = $gallery->en_title;

        $this->fa_description = $gallery->fa_description;
        $this->en_description = $gallery->en_description;

        $this->sort_order = $gallery->sort_order;

        $this->status = $gallery->status;

        $this->currentImage = $gallery->image;

        $this->image = null;

        $this->showModal = true;
    }

    public function save()
    {
        $this->validate();

        $gallery = Gallery::find($this->galleryId);

        $imagePath = $gallery?->image;

        if ($this->image) {

            $imagePath = $this->image->store('products/images', 'public');
        }

        Gallery::updateOrCreate(

            ['id' => $this->galleryId],

            [

                'fa_title' => $this->fa_title,

                'en_title' => $this->en_title,

                'fa_description' => $this->fa_description,

                'en_description' => $this->en_description,

                'image' => $imagePath,

                'sort_order' => $this->sort_order,

                'status' => $this->status,

            ]

        );

        $this->showModal = false;

        $this->resetForm();

        $this->resetPage();

        session()->flash('success', 'عملیات با موفقیت انجام شد.');
    }

    public function delete($id)
    {
        $gallery = Gallery::findOrFail($id);

        if (
            $gallery->image &&
            Storage::disk('public')->exists($gallery->image)
        ) {

            Storage::disk('public')->delete($gallery->image);
        }

        $gallery->delete();

        session()->flash('success', 'با موفقیت حذف شد.');
    }

    public function resetForm()
    {
        $this->reset([

            'galleryId',

            'fa_title',

            'en_title',

            'fa_description',

            'en_description',

            'image',

            'currentImage',

            'sort_order',

            'status',

        ]);

        $this->status = 'active';

        $this->sort_order = 0;

        $this->resetValidation();
    }

    public function render()
    {
        $galleries = Gallery::where(function ($query) {

            $query
                ->where('fa_title', 'like', "%{$this->search}%")
                ->orWhere('en_title', 'like', "%{$this->search}%");
        })
            ->orderBy('sort_order')
            ->latest()
            ->paginate(10);

        return view(
            'livewire.gallery-management',
            compact('galleries')
        );
    }
}
