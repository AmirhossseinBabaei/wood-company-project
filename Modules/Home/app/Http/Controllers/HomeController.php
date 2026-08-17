<?php

declare(strict_types=1);

namespace Modules\Home\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Modules\Home\app\Http\Services\HomeService;

class HomeController extends Controller
{
    public function __construct(public HomeService $service)
    {
    }

    public function index(): View
    {
        $data = $this->service->getHomeData();

        return view('home::index', compact('data'));
    }
}
