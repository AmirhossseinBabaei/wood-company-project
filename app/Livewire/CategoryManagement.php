<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Storage;


#[Layout('components.layouts.dashboard')]
class CategoryManagement extends Component
{

    use WithPagination, WithFileUploads;


    public $categoryId;

    public $parent_id = null;

    public $fa_name = '';
    public $en_name = '';

    public $fa_slug = '';
    public $en_slug = '';

    public $fa_description = '';
    public $en_description = '';

    public $image;

    public $currentImage = '';

    public $showModal = false;

    protected function rules()
    {

        return [

            'parent_id' => 'nullable|exists:categories,id',


            'fa_name' => 'required|string|max:255',

            'en_name' => 'required|string|max:255',



            'fa_slug' =>
            'required|string|max:255|unique:categories,fa_slug,' . $this->categoryId,


            'en_slug' =>
            'required|string|max:255|unique:categories,en_slug,' . $this->categoryId,



            'fa_description' => 'nullable|string',

            'en_description' => 'nullable|string',



            'image' => $this->categoryId
                ? 'nullable|image|max:20048'
                : 'required|image|max:20048',

        ];
    }




    public function create()
    {

        $this->resetForm();

        $this->showModal = true;
    }

    public function edit($id)
    {

        $category = Category::findOrFail($id);

        $this->categoryId = $category->id;

        $this->parent_id = $category->parent_id;


        $this->fa_name = $category->fa_name;

        $this->en_name = $category->en_name;


        $this->fa_slug = $category->fa_slug;

        $this->en_slug = $category->en_slug;


        $this->fa_description = $category->fa_description;

        $this->en_description = $category->en_description;


        $this->currentImage = $category->image;

        $this->showModal = true;
    }

    public function save()
    {

        $this->validate();

        $category = Category::find($this->categoryId);

        $imagePath = $category?->image;

        if ($this->image) {

            if ($category?->image && Storage::disk('public')->exists($category->image)) {
                Storage::disk('public')->delete($category->image);
            }

            $imagePath = $this->image->store(
                'categories',
                'public'
            );
        }

        Category::updateOrCreate(
            [

                'id' => $this->categoryId

            ],

            [
                'parent_id' => null,


                'fa_name' => $this->fa_name,

                'en_name' => $this->en_name,


                'fa_slug' => $this->fa_slug,

                'en_slug' => $this->en_slug,


                'fa_description' => $this->fa_description,

                'en_description' => $this->en_description,


                'image' => $imagePath,
            ]
        );

        $this->showModal = false;

        $this->resetForm();
        session()->flash(
            'success',
            'عملیات با موفقیت انجام شد.'
        );
    }

    public function delete($id)
    {

        $category = Category::find($id);

        if ($category->image && Storage::disk('public')->exists($category->image)) {

            Storage::disk('public')->delete($category->image);
        }

        Product::where('category_id', $category->id)->delete();
        $category->delete();

        session()->flash(
            'success',
            'دسته بندی حذف شد.'
        );
    }

    public function resetForm()
    {


        $this->reset([

            'categoryId',

            'parent_id',


            'fa_name',

            'en_name',


            'fa_slug',

            'en_slug',


            'fa_description',

            'en_description',


            'image',

            'currentImage',

        ]);



        $this->resetValidation();
    }

    public function render()
    {


        $categories = Category::with('parent')

            ->latest()

            ->paginate(10);




        $parents = Category::orderBy('fa_name')->get();




        return view(

            'livewire.category-management',

            compact(
                'categories',
                'parents'
            )

        );
    }
}
