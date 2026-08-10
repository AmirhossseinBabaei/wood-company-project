<?php

namespace Modules\Gallery\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Modules\Gallery\app\Models\Gallery;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::orderBy('id', 'desc')->paginate(10);

        return view('gallery::front.index', compact('galleries'));
    }
}
