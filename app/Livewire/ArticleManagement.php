<?php

namespace App\Livewire;

use App\Models\Article;
use App\Models\ArticleCategory;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

#[Layout('components.layouts.dashboard')]
class ArticleManagement extends Component
{
    use WithFileUploads, WithPagination;

    protected $paginationTheme = 'tailwind';

    public $articleId;

    public $article_category_id = '';

    public $fa_title = '';
    public $fa_summery = '';
    public $fa_content = '';

    public $en_title = '';
    public $en_summery = '';
    public $en_content = '';

    public $status = 1;
    public $image;

    public $currentImage = null;

    public $showModal = false;

    protected function rules()
    {
        return [
            'article_category_id' => 'required|exists:article_categories,id',
            'fa_title' => 'required|string|max:255',
            'en_title' => 'required|string|max:255',
            'fa_summery' => 'required|string',
            'en_summery' => 'required|string',
            'fa_content' => 'required|string',
            'en_content' => 'required|string',
            'status' => 'required',
            'image' => $this->articleId
                ? 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'
                : 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ];
    }

    public function create()
    {
        $this->resetForm();

        $this->status = 1;

        $this->showModal = true;
    }

    public function edit($id)
    {
        $article = Article::findOrFail($id);

        $this->articleId = $article->id;
        $this->article_category_id = $article->article_category_id;
        $this->en_title = $article->en_title;
        $this->fa_title = $article->fa_title;
        $this->en_summery = $article->en_summery;
        $this->fa_summery = $article->fa_summery;
        $this->en_content = $article->en_content;
        $this->fa_content = $article->fa_content;
        $this->status = $article->status;

        $this->currentImage = $article->image;

        $this->image = null;

        $this->showModal = true;
    }

    public function save()
    {
        $this->validate();

        $data = [
            'article_category_id' => $this->article_category_id,
            'fa_title' => $this->fa_title,
            'fa_summery' => $this->fa_summery,
            'fa_content' => $this->fa_content,
            'en_title' => $this->en_title,
            'en_summery' => $this->en_summery,
            'en_content' => $this->en_content,
            'status' => $this->status,
            'view_count' => 0
        ];

        if ($this->image) {
            $data['image'] = $this->image->store('articles', 'public');
        }

        Article::updateOrCreate(
            ['id' => $this->articleId],
            $data
        );

        $this->showModal = false;

        $this->resetForm();

        session()->flash('success', 'عملیات با موفقیت انجام شد.');
    }

    public function delete($id)
    {
        Article::findOrFail($id)->delete();

        session()->flash('success', 'مقاله با موفقیت حذف شد.');
    }

    public function resetForm()
    {
        $this->reset([
            'articleId',
            'article_category_id',
            'fa_title',
            'fa_summery',
            'fa_content',
            'en_title',
            'en_summery',
            'en_content',
            'status',
            'image',
            'currentImage',
        ]);

        $this->resetValidation();
    }

    public function render()
    {
        $articles = Article::with('category')
            ->latest()
            ->paginate(10);

        $categories = ArticleCategory::orderBy('fa_name')
            ->get();

        return view('livewire.article-management', [
            'articles' => $articles,
            'categories' => $categories,
        ]);
    }
}
