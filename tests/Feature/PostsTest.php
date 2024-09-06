<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class PostsTest extends TestCase
{
    use RefreshDatabase;

    public function test_homepage_contains_no_post()
    {
        $response = $this->get('/');

        $response->assertStatus(200);

        $response->assertSee('No posts found');
    }

    public function test_homepage_contains_some_posts()
    {
        // Arrange
        $user = User::create([
            'name' => 'John Doe',
            'email' => 'sixtusagbo211@gmail.com',
            'password' => Hash::make('password')

        ]);
        $category = Category::create([
            'name' => 'test'
        ]);
        $post = Post::create([
            'title' => 'Foo',
            'body' => 'lorem ipsum',
            'user_id' => $user->id,
            'tags' => 'test,youtube',
            'category_id' => $category->id,
            'profile_image' => 'No profile image',
        ]);

        // Act
        $response = $this->get('/');

        // Assert
        $response->assertStatus(200);
        $response->assertDontSee('No posts found');
        $response->assertSee('Foo');
        $response->assertViewHas('posts', function ($collection) use ($post) {
            return $collection->contains($post);
        });
    }
}
