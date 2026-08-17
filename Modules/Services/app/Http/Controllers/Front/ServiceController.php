<?php

declare(strict_types=1);

namespace Modules\Services\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Modules\Services\Models\Service;

class ServiceController extends Controller
{

    public function index(): View
    {
        $services = Service::latest()
            ->paginate(10);

        return view('services::front.services', compact('services'));
    }
}
