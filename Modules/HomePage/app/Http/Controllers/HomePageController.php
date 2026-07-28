<?php

namespace Modules\HomePage\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    /**
     * Display of home page.
     */
    public function index()
    {
        return view('homepage::index');
    }
}
