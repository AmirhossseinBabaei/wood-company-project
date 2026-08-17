<?php

declare(strict_types=1);

namespace Modules\Project\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Modules\Project\Models\Project;

class ProjectController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        $projects = Project::latest()
            ->paginate(10);

        return view('project::front.projects', compact('projects'));
    }

    /**
     * @param string $name
     * @param int $id
     * @return View
     */
    public function show(int $id, string $name): View
    {
        $project = Project::with(['images', 'properties'])
            ->find($id);

        return view('project::front.show', compact('project'));
    }
}
