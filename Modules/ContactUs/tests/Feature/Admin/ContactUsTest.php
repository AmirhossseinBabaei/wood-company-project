<?php

namespace Modules\ContactUs\Tests\Feature\Admin;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Modules\ContactUs\app\Models\ContactMessage;
use Tests\TestCase;

class ContactUsTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_see_contact_messages(): void
    {
        $user = User::factory()->create();

        ContactMessage::factory()->count(5)->create();

        $this->actingAs($user)
            ->get(route((app()->getLocale() . '.dashboard.contact-us.index')))
            ->assertOk()
            ->assertViewHas('contacts');
    }

    public function test_user_can_show_contact_message(): void
    {
        $user = User::factory()->create();

        $contact = ContactMessage::factory()->create();

        $this->actingAs($user)
            ->get(route('dashboard.contact-us.show', [
                'contactMessage' => $contact,
            ]))
            ->assertOk()
            ->assertViewHas('contactMessage');
    }

    public function test_user_can_read_contact_message(): void
    {
        $user = User::factory()->create();

        $contact = ContactMessage::factory()
            ->unread()
            ->create();

        $this->actingAs($user)
            ->patch(route('dashboard.contact-us.read', [
                'contactMessage' => $contact,
            ]))
            ->assertRedirect()
            ->assertSessionHas(
                'success',
                __('ContactUs::words.success_confirm')
            );

        $this->assertDatabaseHas('contact_messages', [
            'id' => $contact->id,
            'is_read' => true,
        ]);
    }
}
