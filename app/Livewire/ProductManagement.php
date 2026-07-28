<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Package;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

#[Layout('components.layouts.dashboard')]
class ProductManagement extends Component
{
    use WithPagination, WithFileUploads;

    protected $paginationTheme = 'tailwind';

    public $search = '';

    public $productId;

    public $category_id = '';

    public $fa_name = '';

    public $en_name = '';

    public $fa_description = '';

    public $en_description = '';

    public $image;

    public $catalog_file;

    public $currentImage = '';

    public $currentCatalog = '';

    public $status = 'active';

    public $package_ids = [];

    public $showModal = false;

    protected function rules()
    {
        return [

            'category_id' => 'required|exists:categories,id',

            'fa_name' => 'required|string|max:255',

            'en_name' => 'required|string|max:255',

            'fa_description' => 'nullable|string',

            'en_description' => 'nullable|string',

            'image' => $this->productId
                ? 'nullable|image'
                : 'required|image',

            'catalog_file' => $this->productId
                ? 'nullable|mimes:pdf|max:10240'
                : 'required|mimes:pdf|max:10240',

            'status' => 'required|in:active,inactive',

            'package_ids' => 'required|array|min:1',

            'package_ids.*' => 'exists:packages,id',

        ];
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function create()
    {
        $this->resetForm();

        $this->showModal = true;
    }

    public function edit(int $id)
    {
        $product = Product::with('packages')->findOrFail($id);

        $this->productId = $product->id;

        $this->category_id = $product->category_id;

        $this->fa_name = $product->fa_name;

        $this->en_name = $product->en_name;

        $this->fa_description = $product->fa_description;

        $this->en_description = $product->en_description;

        $this->status = $product->status;

        $this->package_ids = $product->packages->pluck('id')->toArray();

        $this->currentImage = $product->image;

        $this->currentCatalog = $product->catalog_file;

        $this->showModal = true;
    }
    public function save()
    {
        $this->validate();

        $product = Product::find($this->productId);

        $imagePath = $product?->image;

        $catalogPath = $product?->catalog_file;

        if ($this->image) {

            $imagePath = $this->image->store('products/images', 'public');
        }

        if ($this->catalog_file) {

            $catalogPath = $this->catalog_file->store('products/catalogs', 'public');
        }

        $product = Product::updateOrCreate(

            [

                'id' => $this->productId,

            ],

            [

                'category_id' => $this->category_id,

                'fa_name' => $this->fa_name,

                'en_name' => $this->en_name,

                'fa_description' => $this->fa_description,

                'en_description' => $this->en_description,

                'image' => $imagePath,

                'catalog_file' => $catalogPath,

                'status' => $this->status,

            ]

        );

        $product->packages()->sync($this->package_ids);

        $this->showModal = false;

        $this->resetForm();

        session()->flash('success', 'عملیات با موفقیت انجام شد.');
    }
    public function delete(int $id)
    {
        $product = Product::find($id);
        if ($product) {
            DB::table('product_packages')->where('product_id', $product->id)->delete();
            $product->delete();
        }

        session()->flash('success', 'محصول با موفقیت حذف شد.');
    }

    public function resetForm()
    {
        $this->reset([

            'productId',

            'category_id',

            'fa_name',

            'en_name',

            'fa_description',

            'en_description',

            'image',

            'catalog_file',

            'package_ids',

            'currentImage',

            'currentCatalog',

        ]);

        $this->status = 'active';

        $this->resetValidation();
    }

    public function render()
    {
        $products = Product::with(['category', 'packages'])

            ->where(function ($query) {

                $query->where('fa_name', 'like', "%{$this->search}%")

                    ->orWhere('en_name', 'like', "%{$this->search}%")

                    ->orWhereHas('category', function ($q) {

                        $q->where('fa_name', 'like', "%{$this->search}%");
                    });
            })

            ->latest()

            ->paginate(10);

        $categories = Category::orderBy('fa_name')->get();

        $packages = Package::orderBy('fa_title')->get();

        return view(
            'livewire.product-management',
            compact(
                'products',
                'categories',
                'packages'
            )
        );
    }
}
