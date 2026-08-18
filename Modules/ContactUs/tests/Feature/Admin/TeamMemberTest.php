<?php

declare(strict_types=1);

namespace Modules\ContactUs\Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\ContactUs\Models\TeamMember;
use Tests\TestCase;

class TeamMemberTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @return void
     */
    public function test_user_can_create_team_members()
    {
        $user = User::factory()->create();
        $teamMemberData = TeamMember::factory()->toArray();

        $response = $this->actingAs($user)
            ->post((app()->getLocale() . ".dashboard.team-members.create"), $teamMemberData);

        $this->assertDatabaseHas(TeamMember::getTable(), ['id' => $teamMemberData->id, 'full_name' => $teamMemberData->full_name]);
        $response->assertOk();
    }

    /**
     * @return void
     */
    public function test_user_can_see_team_members(): void
    {
        $user = User::factory()->create();

        TeamMember::factory()->count(5)->create();

        $this->actingAs($user)
            ->get(route((app()->getLocale() . '.dashboard.team-members.index')))
            ->assertOk()
            ->assertViewHas('contacts');
    }

    /**
     * @return void
     */
    public function test_user_can_show_team_member()
    {
        $user = User::factory()->create();
        $teamMember = TeamMember::factory()->create();

        $this->actingAs($user)
            ->get(route((app()->getLocale() . '.dashboard.team-members.show'), $teamMember))
            ->assertOk()
            ->assertViewHas('teamMember');
    }

    /**
     * @return void
     */
    public function test_user_can_edit_team_member()
    {
        $user = User::factory()->create();
        $teamMember = TeamMember::factory()->create();

        $this->actingAs($user)
            ->get(route((app()->getLocale() . '.dashboard.team-members.show'), $teamMember))
            ->assertOk()
            ->assertViewHas('teamMember');
    }

    /**
     * @return void
     */
    public function test_user_can_update_team_member()
    {
        $user = User::factory()->create();
        $teamMemberData = TeamMember::factory()->toArray();

        $data = ['full_name' => 'AmirhosseinBabaei'];

        $response = $this->actingAs($user)
            ->post(route((app()->getLocale() . ".dashboard.team-members.update"), $teamMemberData, $data));

        $this->assertDatabaseHas(TeamMember::getTable(), ['id' => $teamMemberData->id, 'full_name' => $data['full_name']]);
        $response->assertOk();
    }

    /**
     * @return void
     */
    public function test_user_can_destroy_team_member()
    {
        $user = User::factory()->create();
        $teamMemberData = TeamMember::factory()->toArray();

        $response = $this->actingAs($user)
            ->post(route((app()->getLocale() . ".dashboard.team-members.delete"), $teamMemberData));

        $this->assertDatabaseMissing(TeamMember::getTable(), ['id' => $teamMemberData->id]);
        $response->assertOk();
    }
}
