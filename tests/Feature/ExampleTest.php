<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Post;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_view_post_page()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /** @test */
    public function user_can_post()
    {
        Storage::fake('public');

        $image = UploadedFile::fake()->image('duck.png');

        $this->assertCount(0, Post::get());

        $this->post('/', [
            'content' => 'Duck!',
            'image' => $image,
        ])->assertStatus(302);

        $this->assertCount(1, Post::get());

        $post = Post::first();
        $this->assertEquals('Duck!', $post->content);
    }

    /** @test */
    public function user_can_view_post()
    {
        $post = Post::factory()->create();

        $this->get("/share/{$post->id}")->assertStatus(200);

        $post->delete();

        $this->get("/share/{$post->id}")->assertStatus(404);
    }
}
