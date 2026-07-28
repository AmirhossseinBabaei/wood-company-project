<?php

namespace App\Livewire;

use App\Models\Article;
use App\Models\ArticleViewers;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.home')]
class SingleArticlePage extends Component
{
    public $article;

    public function mount(string $name)
    {
        $name = str_replace('-', ' ', $name);

        $this->article = Article::where('fa_title', $name)
            ->orWhere('en_title', $name)
            ->first();
    }

    public function render()
    {
        if (null == $this->article) {
            return;
        }

        $ip = request()->ip();

        $viewer = ArticleViewers::firstOrCreate([
            'article_id' => $this->article->id,
            'ip' => $ip,
        ]);

        if ($viewer->wasRecentlyCreated) {
            $this->article->increment('view_count');
        }
        $lastArticles = Article::where('article_category_id', $this->article->article_category_id)
        ->orderBy('id')
        ->limit(3)
        ->get();

        return view('livewire.single-article-page', compact('lastArticles'));
    }
}
