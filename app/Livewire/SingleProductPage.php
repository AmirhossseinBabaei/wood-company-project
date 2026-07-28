<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.home')]
class SingleProductPage extends Component
{
    public $product;

    public function mount(string $name)
    {
        $name = str_replace('-', ' ', $name);

        $this->product = Product::where('fa_name', $name)
            ->orWhere('en_name', $name)
            ->first();
    }
    
    public function render()
    {
        if (null == $this->product) {
            return;
        }

        return view('livewire.single-product-page');
    }
}
