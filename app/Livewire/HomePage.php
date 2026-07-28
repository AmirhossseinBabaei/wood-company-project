<?php

namespace App\Livewire;

use App\Models\Article;
use App\Models\Collaboration;
use App\Models\Product;
use App\Models\Project;
use App\Models\Setting;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.home')]
class HomePage extends Component
{
    public bool $loadComponent = false;


    public function toggleLoadComponent()
    {
        $this->loadComponent = true;
    }

    public function render()
    {
        $setting = Setting::first();
        $articleCount = Article::count();
        $collaborationCount = Collaboration::count();
        $projectCount = Project::count();
        
        $lastProduct = Product::where('status', 'active')
        ->where('fa_name', 'پودر')
        ->first();

        $articles = Article::where('status', 'active')
        ->orderBy('id', 'desc')->limit(3)
        ->get();

        $lastArticles = Article::where('article_category_id', 2)
        ->get();

        $data = [
            'articleCount' => $articleCount,
            'collaborationCount' => $collaborationCount,
            'projectCount' => $projectCount,
            'lastProduct' => $lastProduct,
            'articles' => $articles,
            'lastArticles' => $lastArticles
        ];

        return view('livewire.home-page', compact('setting', 'data'));
    }
}
