<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class PostsTest extends TestCase
{
    public function test_homepage_contains_no_post()
    {
        $response = $this->get('/');

        $response->assertStatus(200);

        $response->assertSee('No posts found');
    }

    public function test_homepage_contains_some_posts()
    {
        Post::create([
            'title' => 'Foo',
            'body' => 'lorem ipsum',
            'user_id' => 1,
            'tags' => 'test,youtube',
            'category_id' => 1,
        ]);
        $response = $this->get('/');

        $response->assertStatus(200);

        $response->assertDontSee('No posts found');
    }
}
