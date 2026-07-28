<?php

namespace App\Livewire;

use App\Models\Menu;
use App\Models\Setting;
use Livewire\Component;

class HeaderComponent extends Component
{
    public bool $loadComponent = false;
    public bool $mobileMenu = false;


    public function toggleLoadComponent()
    {
        $this->loadComponent = true;
    }


    public function toggleMenu()
    {
        $this->mobileMenu = ! $this->mobileMenu;
    }

    public function render()
    {
        $menus = Menu::where('position', 'header')
        ->where('status', 'active')
        ->orderBy('sort_order', 'desc')
        ->get();
        
        $setting = Setting::first();

        return view('livewire.header-component', compact('menus', 'setting'));
    }
}
