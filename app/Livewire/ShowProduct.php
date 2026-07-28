<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.home')]
class ShowProduct extends Component
{
    public $product;

    public function mount(int $id)
    {
        $this->product = Product::find($id);
    }

    public function render()
    {
        if (null == $this->product) {
            return;
        }
        return view('livewire.show-product');
    }
}
