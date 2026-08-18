<?php

declare(strict_types=1);

namespace Modules\Home\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Modules\Home\app\Http\Services\HomeService;

class HomeController extends Controller
{
    /**
     * @param HomeService $service
     * @return View
     */
    public function index(HomeService $service): View
    {
        //get home page data from home service helper
        $data = $service->getHomeData();

        return view('home::index', compact('data'));
    }
}
