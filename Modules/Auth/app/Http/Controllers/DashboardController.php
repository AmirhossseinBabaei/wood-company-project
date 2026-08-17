<?php

declare(strict_types=1);

namespace Modules\Auth\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\View\View;
use Modules\ContactUs\app\Models\ContactMessage;
use Modules\Project\Models\Project;
use Modules\Services\Models\Service;
use Modules\Slider\Models\Slider;

class DashboardController extends Controller
{
    /**
     * @return View
     */
    public function dashboard(): View
    {
        $data = [
            'counters' => [
                'users' => User::count(),
                'projects' => Project::count(),
                'contact_messages_count' => ContactMessage::count(),
                'services' => Service::count()
            ],
            'latest_projects' => Project::latest()->take(3)->get(),
            'latest_services' => Service::latest()->take(3)->get(),
            'latest_sliders' => Slider::latest()->take(3)->get()
        ];

       return view('auth::dashboard', compact('data'));
    }
}
