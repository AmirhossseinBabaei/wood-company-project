<?php

declare(strict_types=1);

namespace Modules\Project\Tests\Features;

use Modules\Project\Models\Project;
use Tests\TestCase;
use Workbench\App\Models\User;

class ProjectTest extends TestCase
{
    /**
     * @return void
     */
    public function testUserCanSeeAllProjects(): void
    {
        Project::factory()->create(5);
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->post('fa.dashboard.projects.index');

        $response->assertOk();
        $response->assertViewHas('projects');
    }

    /**
     * @return void
     */
    public function testUserCanCreateProject()
    {
        $project = Project::factory()->toArray();
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->post('fa.dashboard.projects.create', $project);

        $this->assertDatabaseHas(['fa_title' => $project->fa_name, 'en_name' => $project->en_name]);
        $response->assertRedirect('fa.dashboard.projects.index');
    }

    /**
     * @return void
     */
    public function testUserCanGetProject()
    {
        $project = Project::factory()->toArray();
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->post('fa.dashboard.projects.show', $project);

        $this->assertDatabaseHas(['fa_title' => $project->fa_name, 'en_name' => $project->en_name]);
        $response->assertOk();
    }

    /**
     * @return void
     */
    public function testUserCanSeeEditProjectPage()
    {
        $project = Project::factory()->toArray();
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->post('fa.dashboard.projects.edit', $project);

        $this->assertDatabaseHas(['fa_title' => $project->fa_name, 'en_name' => $project->en_name]);
        $response->assertOk();
    }

    /**
     * @return void
     */
    public function testUserCanUpdateProject()
    {
        $project = Project::factory()->toArray();
        $user = User::factory()->create();

        $data = [
            'fa_name' => 'نام تست',
            'en_name' => 'Test Name'
        ];

        $response = $this->actingAs($user)
            ->post('fa.dashboard.properties.update', $project, $data);

        $this->assertDatabaseMissing(['fa_title' => $project->fa_name, 'en_name' => $project->en_name]);
        $this->assertDatabaseHas(['fa_title' => $data['fa_name'], 'fa_url' => $data['en_name']]);
        $response->assertOk();
    }

    /**
     * @return void
     */
    public function testUserCanDestroyProject()
    {
        $project = Project::factory()->toArray();
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->post('fa.dashboard.projects.destroy', $project);

        $this->assertDatabaseMissing(['id' => $project->id]);
        $response->assertOk();
    }
}
