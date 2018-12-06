<?php

namespace Tests\Feature;

use App\Post;
use App\Admin;
use App\Category;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreatePostTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function can_create_post_successfully()
    {
        $post = $this->createPost();

        $admin = factory(Admin::class)->create();
        
        $this->be($admin);

        $resp = $this->post('/post', $post);

        $resp->assertSessionHas('message');
            
        $this->assertDatabaseHas('posts', [
                'title'  => $post['title']
            ]);
    }


    /** @test */
    public function unauthorized_users_cant_create_posts()
    {
        $post = $this->createPost();

        $this->post('/post', $post)
            ->assertStatus(403);
    }


    protected function createPost()
    {
        $category = $this->createCategory();

        return factory(Post::class)->make([
            'category_id'   => $category->id
        ])->toArray();
    }


    protected function createCategory()
    {
        return factory(Category::class)->create();
    }
}
