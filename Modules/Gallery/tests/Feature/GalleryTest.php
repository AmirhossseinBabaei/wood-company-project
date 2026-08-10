<?php

namespace Modules\Gallery\Tests\Feature;

use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Modules\Gallery\app\Models\Gallery;
use Tests\TestCase;

class GalleryTest extends TestCase
{
    public function test_can_get_gallery_list(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->get(route('dashboard.galleries.index'))
            ->assertStatus(200);
    }


    public function test_can_show_create_gallery_page(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->get(route('dashboard.galleries.create'))
            ->assertStatus(200);
    }


    public function test_can_store_gallery(): void
    {
        Storage::fake('public');

        $user = User::factory()->create();

        $file = UploadedFile::fake()->image('test.jpg');

        $response = $this->actingAs($user)
            ->post(route('dashboard.galleries.store'), [

                'fa_title' => 'عنوان فارسی',
                'en_title' => 'English Title',

                'fa_description' => 'توضیحات فارسی',
                'en_description' => 'English Description',

                'sort_order' => 1,
                'status' => 1,

                'image' => $file,

            ]);


        $response->assertRedirect(
            route('dashboard.galleries.index')
        );

        $this->assertDatabaseHas('galleries', [
            'fa_title' => 'عنوان فارسی',
            'en_title' => 'English Title',
        ]);

        $gallery = Gallery::first();

        Storage::disk('public')
            ->assertExists($gallery->image);
    }

    public function test_can_get_single_gallery(): void
    {
        $user = User::factory()->create();


        $gallery = Gallery::factory()->create();


        $this->actingAs($user)
            ->get(route('dashboard.galleries.show', $gallery))
            ->assertStatus(200);
    }



    public function test_can_show_edit_gallery_page(): void
    {
        $user = User::factory()->create();


        $gallery = Gallery::factory()->create();

        $this->actingAs($user)
            ->get(route('dashboard.galleries.edit', $gallery))
            ->assertStatus(200);
    }



    public function test_can_update_gallery(): void
    {
        Storage::fake('public');


        $user = User::factory()->create();


        $gallery = Gallery::factory()->create([
            'image' => 'gallery/old.jpg'
        ]);


        Storage::disk('public')
            ->put('gallery/old.jpg', 'test');


        $newImage = UploadedFile::fake()
            ->image('new.jpg');



        $response = $this->actingAs($user)
            ->put(route('dashboard.galleries.update', $gallery), [

                'fa_title' => 'عنوان جدید',
                'en_title' => 'New Title',

                'fa_description' => 'desc',
                'en_description' => 'description',

                'sort_order' => 2,

                'status' => 1,

                'image' => $newImage,

            ]);



        $response->assertRedirect(
            route('dashboard.galleries.index')
        );



        $gallery->refresh();


        $this->assertEquals(
            'عنوان جدید',
            $gallery->fa_title
        );


        Storage::disk('public')
            ->assertExists($gallery->image);
    }




    public function test_can_delete_gallery(): void
    {
        Storage::fake('public');


        $user = User::factory()->create();


        $gallery = Gallery::factory()->create([
            'image' => 'gallery/test.jpg'
        ]);


        Storage::disk('public')
            ->put('gallery/test.jpg', 'test');



        $response = $this->actingAs($user)
            ->delete(
                route('dashboard.galleries.destroy', $gallery)
            );



        $response->assertRedirect(
            route('dashboard.galleries.index')
        );


        $this->assertDatabaseMissing(
            'galleries',
            [
                'id' => $gallery->id
            ]
        );


        Storage::disk('public')
            ->assertMissing('gallery/test.jpg');
    }
}
