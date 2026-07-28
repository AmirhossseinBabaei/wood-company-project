<?php

namespace App\Livewire;

use App\Models\ArticleCategory;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

#[Layout('components.layouts.dashboard')]
class ArticleCategoryManagement extends Component
{
    use WithFileUploads, WithPagination;

    public $articleCategoryId;

    public $fa_name = '';
    public $en_name = '';

    public $showModal = false;

    protected function rules()
    {
        return [
            'en_name' => 'required|string|max:255',
            'fa_name' => 'required|string|max:255',
        ];
    }

    public function create()
    {
        $this->resetForm();

        $this->showModal = true;
    }

    public function edit($id)
    {
        $about = ArticleCategory::findOrFail($id);

        $this->articleCategoryId = $about->id;
        $this->fa_name = $about->fa_name;
        $this->en_name = $about->en_name;

        $this->showModal = true;
    }

    public function save()
    {
        $this->validate();

        ArticleCategory::updateOrCreate(
            ['id' => $this->articleCategoryId],
            [
                'fa_name' => $this->fa_name,
                'en_name' => $this->en_name,
            ]
        );

        $this->showModal = false;

        $this->resetForm();

        session()->flash('success', 'عملیات با موفقیت انجام شد.');
    }
        
    public function delete($id)
    {
        ArticleCategory::findOrFail($id)->delete();

        session()->flash('success', 'رکورد با موفقیت حذف شد.');
    }

    public function resetForm()
    {
        $this->reset([
            'articleCategoryId',
            'fa_name',
            'en_name',
        ]);

        $this->resetValidation();
    }

    public function render()
    {
        $articles = ArticleCategory::latest()->paginate(10);

        return view('livewire.article-category-management', compact('articles'));
    }
}