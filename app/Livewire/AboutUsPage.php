<?php

namespace App\Livewire;

use App\Models\AboutUs;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.home')]
class AboutUsPage extends Component
{
    public function render()
    {
        $abouts = AboutUs::all();
        return view('livewire.about-us-page', compact('abouts'));
    }
}
