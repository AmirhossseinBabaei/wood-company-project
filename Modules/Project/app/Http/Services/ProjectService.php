<?php

declare(strict_types=1);

namespace Modules\Project\app\Http\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Modules\Project\Http\Requests\ProjectRequest;
use Modules\Project\Models\Project;
use Modules\Project\Models\ProjectImage;
use Modules\Project\Models\ProjectProperty;

final class ProjectService
{
    /**
     * @param ProjectRequest $request
     * @return void
     */
    public function createProject(ProjectRequest $request)
    {
        DB::transaction(function () use ($request): void {

            //save project without properties, selected-properties and images from request
            $project = Project::create(
                $request->safe()->except([
                    'properties',
                    'selected_properties',
                    'images',
                ])
            );

            //sync project with project property from request
            $project->properties()->sync($request->properties);

            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $imgUrl = $image->store('public', 'projects');

                    ProjectImage::create([
                        'project_id' => $project->id,
                        'img_src' => $imgUrl,
                    ]);
                }
            }
        });
    }

    /**
     * @param ProjectRequest $request
     * @param Project $project
     * @return void
     */
    public function updateProject(ProjectRequest $request, Project $project)
    {
        DB::transaction(function () use ($request, $project): void {

            //save project without properties, selected-properties and images from request
            $project->update(
                $request->safe()->except([
                    'properties',
                    'selected_properties',
                    'images',
                ])
            );

            //save properties
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

            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {

                    $imgUrl = $image->store('public', 'projects');

                    ProjectImage::create([
                        'project_id' => $project->id,
                        'img_src' => $imgUrl,
                    ]);
                }
            }
        });
    }

    /**
     * @param Project $project
     * @return void
     */
    public function deleteProject(Project $project)
    {
        DB::transaction(function () use ($project): void {

            //delete project property records for defending from error cascade crash
            ProjectProperty::where('project_id', $project->id)->delete();

            $project->images()->delete();
            $project->delete();

            foreach ($project->images as $image) {
                Storage::disk('public')->delete($image->img_src);
            }
        });

    }
}
