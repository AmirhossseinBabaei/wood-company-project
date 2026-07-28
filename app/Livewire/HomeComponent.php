<?php

namespace App\Livewire;

use App\Models\Menu;
use Livewire\Component;

class HomeComponent extends Component
{
    public bool $loadComponent = false;

    public function toggleLoadComponent()
    {
        $this->loadComponent = true;
    }

    public function render()
    {
        $menus = $this->loadComponent ? Menu::all() : [];
        return view('components.layouts.home', compact('menus'));
    }
}
