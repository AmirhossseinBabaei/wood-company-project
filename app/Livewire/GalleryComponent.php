<?php

namespace App\Livewire;

use App\Models\Gallery;
use Livewire\Component;

class GalleryComponent extends Component
{
    public function render()
    {
        $galleries = Gallery::where('status', 'active')->orderBy('sort_order', 'asc')->get();

        return view('livewire.gallery-component', compact('galleries'));
    }
}