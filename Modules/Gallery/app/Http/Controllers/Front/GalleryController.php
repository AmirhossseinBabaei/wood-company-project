<?php

declare(strict_types=1);

namespace Modules\Gallery\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Modules\Gallery\app\Models\Gallery;

class
GalleryController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        $galleries = Gallery::activeGalleries()
            ->latest('sort_order')
            ->paginate(10);

        return view('gallery::front.gallery', compact('galleries'));
    }
}
