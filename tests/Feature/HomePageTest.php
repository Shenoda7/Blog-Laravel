<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomePageTest extends TestCase
{
    public function test_homepage_shows_a_post(): void
    {
        $post = Post::first();
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertViewHas('posts', function($posts) use ($post) {
            return $posts->contains($post);
        });
    }

    public function test_post_page_by_slug_shows_post_content(): void
    {
        $post = Post::first();
        $response = $this->get("/posts/{$post->slug}");
        $response->assertStatus(200);
        $response->assertSee($post->body, false);
    }

    public function test_non_existing_post_return_404(): void
    {
        $response = $this->get('/posts/non-existing-id');
        $response->assertStatus(404);
    }

    public function test_post_page_shows_category_name()
    {
        $post = Post::first();
        $category_name = $post->category->name;
        $response = $this->get('/posts/' . $post->slug);
        $response->assertSee($category_name);
    }

    public function test_database_has_a_post()
    {
        $this->assertDatabaseHas('posts', [
            'title' => 'My Family Post',
        ]);
    }

}
