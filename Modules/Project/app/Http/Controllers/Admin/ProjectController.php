<?php

declare(strict_types=1);

namespace Modules\Project\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Modules\Project\app\Http\Services\Inquiry\Drivers\ImageUploaderService;
use Modules\Project\app\Http\Services\Inquiry\FileUploaderInquiry;
use Modules\Project\Http\Requests\ProjectRequest;
use Modules\Project\Models\Project;
use Modules\Project\Models\ProjectImage;
use Modules\Project\Models\ProjectProperty;
use Modules\Project\Models\Property;

class ProjectController extends Controller
{
    public function index(): View
    {
        $projects = Project::query()
            ->with(['properties', 'images'])
            ->latest()
            ->paginate(10);

        return view(
            'project::admin.projects.index',
            compact('projects')
        );
    }

    public function create(): View
    {
        $properties = Property::latest()
            ->get();

        return view('project::admin.projects.create', compact('properties'));
    }

    public function store(
        ProjectRequest $request
    ): RedirectResponse
    {
        DB::transaction(function () use (
            $request,
        ): void {

            $project = Project::create(
                $request->safe()->except([
                    'properties',
                    'selected_properties',
                    'images',
                ])
            );

            $project->properties()->sync($request->properties);

            /*
             * Multiple Images
             */
            $fileUploaderInquiry = new FileUploaderInquiry(new ImageUploaderService());
            if ($request->hasFile('images')) {

                foreach ($request->file('images') as $image) {

                    $imgUrl = $fileUploaderInquiry->upload(
                        $image,
                        'projects',
                        'public'
                    );

                    ProjectImage::create([
                        'project_id' => $project->id,
                        'img_src' => $imgUrl,
                    ]);
                }
            }
        });

        return to_route((app()->getLocale() . '.dashboard.projects.index'))
            ->with(
                'success',
                __('messages.education_success')
            );
    }

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

    public function update(
        ProjectRequest $request,
        Project        $project
    ): RedirectResponse
    {

        DB::transaction(function () use ($request, $project): void {
            /*
             * Update Project
             */
            $project->update(
                $request->safe()->except([
                    'properties',
                    'selected_properties',
                    'images',
                ])
            );

            foreach ($request->input('properties', []) as $propertyId => $values) {
                DB::table('project_property')->updateOrInsert(
                    [
                        'project_id' => $project->id,
                        'property_id' => $propertyId,
                    ],
                    [
                        'fa_value' => $values['fa_value'] ?? null,
                        'en_value' => $values['en_value'] ?? null,
                    ]
                );
            }

            /*
             * Multiple Images
             */
            $fileUploaderInquiry = new FileUploaderInquiry(
                new ImageUploaderService()
            );

            if ($request->hasFile('images')) {

                foreach ($request->file('images') as $image) {

                    $imgUrl = $fileUploaderInquiry->upload(
                        $image,
                        'projects',
                        'public'
                    );

                    ProjectImage::create([
                        'project_id' => $project->id,
                        'img_src' => $imgUrl,
                    ]);
                }
            }
        });

        return to_route((app()->getLocale() . '.dashboard.projects.index'))
            ->with(
                'success',
                __('messages.education_success')
            );
    }

    public function show(Project $project)
    {
        $project->properties()[0]->projectProperties()
            ->where('project_id', $project->id)
            ->first();
    }

    public function destroy(Project $project): RedirectResponse
    {
        $fileUploaderInquiry = new FileUploaderInquiry(
            new ImageUploaderService()
        );

        DB::transaction(function () use ($project, $fileUploaderInquiry): void {

            //delete project property records for defending from error cascade crash
            ProjectProperty::where('project_id', $project->id)->delete();

            $project->images()->delete();
            $project->delete();

            foreach ($project->images as $image) {
                $fileUploaderInquiry->destroy($image->img_src);
            }
        });

        return to_route((app()->getLocale() . '.dashboard.projects.index'))
            ->with('success', __('messages.education_success'));
    }
}
