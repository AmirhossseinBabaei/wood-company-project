<?php

namespace App\Livewire;

use App\Models\Industry;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.home')]
class IndustriesPage extends Component
{
    public function render()
    {
        $industries = Industry::orderBy('id')->paginate(8);
        
        return view('livewire.industries-page', compact('industries'));
    }
}