<?php

namespace App\Livewire;

use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\Setting;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('components.layouts.home')]
class ArticlePage extends Component
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

        $categories = ArticleCategory::orderBy('fa_name')->get();

        $articles = Article::query()

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

                $query->where('article_category_id', $this->category);

            })

            ->latest()

            ->paginate(8);

        return view('livewire.article-page', compact(
            'articles',
            'categories',
            'websiteName'
        ));
    }
}