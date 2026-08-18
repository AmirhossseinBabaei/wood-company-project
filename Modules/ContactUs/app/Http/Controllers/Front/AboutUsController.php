<?php

declare(strict_types=1);

namespace Modules\ContactUs\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\View\View;
use Modules\ContactUs\Models\TeamMember;
use Modules\Project\Models\Project;
use Modules\Services\Models\Service;

class AboutUsController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        $lastFourProjects = Project::latest()
            ->take(4)
            ->get();

        $counters = [
            'servicesCount' => Service::count(),
            'projectsCount' => Project::count(),
            'usersCount' => User::count()
        ];

        $members = TeamMember::latest()
            ->activeMembers()
            ->get();

        return view('contact-messages::front.about-us', compact('lastFourProjects', 'counters', 'members'));
    }
}
