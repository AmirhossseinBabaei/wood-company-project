<?php

namespace App\Livewire;

use App\Models\Article;
use App\Models\Category;
use App\Models\Collaboration;
use App\Models\ContactMessage;
use App\Models\Industry;
use App\Models\Menu;
use App\Models\Package;
use App\Models\Product;
use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.dashboard')]
class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.dashboard', [
            'usersCount' => User::count(),
            'productsCount' => Product::count(),
            'articlesCount' => Article::count(),
            'messagesCount' => ContactMessage::count(),

            'categoriesCount' => Category::count(),
            'industriesCount' => Industry::count(),
            'packagesCount' => Package::count(),
            'menusCount' => Menu::count(),

            'activeProducts' => Product::where('status', true)->count(),
            'inactiveProducts' => Product::where('status', false)->count(),

            'readMessages' => ContactMessage::where('is_read', true)->count(),
            'unreadMessages' => ContactMessage::where('is_read', false)->count(),

            'latestUsers' => User::latest()->take(5)->get(),
            'latestProducts' => Product::latest()->take(5)->get(),
            'latestMessages' => ContactMessage::latest()->take(5)->get(),
            'latestCollaborations' => Collaboration::latest()->take(5)->get(),
        ]);
    }
}
