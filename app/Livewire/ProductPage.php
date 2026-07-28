<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use App\Models\Setting;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('components.layouts.home')]
class ProductPage extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search = '';

    public $category = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingCategory()
    {
        $this->resetPage();
    }

    public function render()
    {
        $websiteName = Setting::first()->website_name;

        $categories = Category::orderBy('fa_name')->get();

        $products = Product::query()

            ->where('status', 'active')

            ->with('category')

            ->when($this->search, function ($query) {

                $query->where(function ($q) {

                    $q->where('fa_name', 'like', "%{$this->search}%")
                        ->orWhereHas('category', function ($cat) {

                            $cat->where('fa_name', 'like', "%{$this->search}%");

                        });

                });

            })

            ->when($this->category, function ($query) {

                $query->where('category_id', $this->category);

            })

            ->latest()

            ->paginate(8);

        return view('livewire.product-page', compact(
            'products',
            'categories',
            'websiteName'
        ));
    }
}