<?php

declare(strict_types=1);

namespace Modules\Auth\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Modules\Auth\app\Http\Services\DashboardViewService;

class DashboardController extends Controller
{
    /**
     * @param DashboardViewService $viewService
     * @return View
     */
    public function dashboard(DashboardViewService $viewService): View
    {
        $data = $viewService->getDashboardData();

        return view('auth::dashboard', compact('data'));
    }
}
