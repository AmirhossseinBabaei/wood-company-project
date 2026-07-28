<?php

namespace App\Livewire;

use App\Models\Menu;
use App\Models\Setting;
use Livewire\Component;

class FooterComponent extends Component
{
    public function render()
    {
        $setting = Setting::first();
        $menus = Menu::where('position', 'footer')->get();

        return view('livewire.footer-component', compact('setting', 'menus'));
    }
}
