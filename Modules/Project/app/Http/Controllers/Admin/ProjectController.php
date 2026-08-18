<?php

declare(strict_types=1);

namespace Modules\Project\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Modules\Project\app\Http\Services\ProjectService;
use Modules\Project\Http\Requests\ProjectRequest;
use Modules\Project\Models\Project;
use Modules\Project\Models\Property;

class ProjectController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        $projects = Project::with(['properties', 'images'])
            ->latest()
            ->paginate(10);

        return view(
            'project::admin.projects.index',
            compact('projects')
        );
    }

    /**
     * @return View
     */
    public function create(): View
    {
        $properties = Property::latest()
            ->get();

        return view('project::admin.projects.create', compact('properties'));
    }

    /**
     * @param ProjectRequest $request
     * @param ProjectService $service
     * @return RedirectResponse
     */
    public function store(ProjectRequest $request, ProjectService $service): RedirectResponse
    {
        $service->createProject($request);

        return to_route((app()->getLocale() . '.dashboard.projects.index'))
            ->with(
                'success',
                __('messages.education_success')
            );
    }

    /**
     * @param Project $project
     * @return View
     */
    public function edit(Project $project): View
    {
        $project->load([
            'properties',
            'images',
        ]);

        $properties = Property::latest()->get();

        return view(
            'project::admin.projects.edit',
            compact('project', 'properties')
        );
    }

    /**
     * @param ProjectRequest $request
     * @param Project $project
     * @param ProjectService $service
     * @return RedirectResponse
     */
    public function update(ProjectRequest $request, Project $project, ProjectService $service): RedirectResponse
    {
        $service->updateProject($request, $project);

        return to_route((app()->getLocale() . '.dashboard.projects.index'))
            ->with(
                'success',
                __('messages.education_success')
            );
    }

    /**
     * @param Project $project
     * @return void
     */
    public function show(Project $project)
    {
        $project->properties()[0]->projectProperties()
            ->where('project_id', $project->id)
            ->first();
    }

    /**
     * @param Project $project
     * @param ProjectService $projectService
     * @return RedirectResponse
     */
    public function destroy(Project $project, ProjectService $projectService): RedirectResponse
    {
        $projectService->deleteProject($project);

        return to_route((app()->getLocale() . '.dashboard.projects.index'))
            ->with('success', __('messages.education_success'));
    }
}
