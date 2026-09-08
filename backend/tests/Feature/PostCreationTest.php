<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostCreationTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_create_a_post_without_manual_slug(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);

        $response = $this->actingAs($admin)->post('/admin/posts', [
            'title' => 'Article 1',
            'excerpt' => "C'est une article d'essai",
            'body' => 'Bonjour monde',
            'published_at' => '1997-07-26',
        ]);

        $response->assertRedirect('/admin/posts');
        $this->assertDatabaseHas('posts', [
            'title' => 'Article 1',
            'slug' => 'article-1',
        ]);
    }

    public function test_duplicate_title_generates_a_unique_slug(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);

        \App\Models\Post::create([
            'title' => 'Article 1',
            'slug' => 'article-1',
            'excerpt' => 'Premier article',
            'body' => 'Contenu initial',
        ]);

        $response = $this->actingAs($admin)->post('/admin/posts', [
            'title' => 'Article 1',
            'excerpt' => 'Deuxième article',
            'body' => 'Contenu second',
            'published_at' => '1997-07-26',
        ]);

        $response->assertRedirect('/admin/posts');
        $this->assertDatabaseHas('posts', ['slug' => 'article-1-1']);
    }

    public function test_admin_post_index_renders_published_date(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);

        \App\Models\Post::create([
            'title' => 'Article 2',
            'slug' => 'article-2',
            'excerpt' => 'Extrait',
            'body' => 'Contenu',
            'published_at' => '1997-07-26',
        ]);

        $response = $this->actingAs($admin)->get('/admin/posts');

        $response->assertOk();
        $response->assertSee('Article 2');
        $response->assertSee('1997-07-26');
    }

    public function test_public_blog_uses_featured_image_field(): void
    {
        \App\Models\Post::create([
            'title' => 'Article blog image',
            'slug' => 'article-blog-image',
            'excerpt' => 'Extrait article',
            'body' => 'Contenu article',
            'featured_image' => 'posts/example.jpg',
            'published_at' => '1997-07-26',
        ]);

        $response = $this->get('/blog');

        $response->assertOk();
        $response->assertSee('/storage/posts/example.jpg');
    }
}
