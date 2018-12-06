<?php

namespace Tests\Feature;

use App\Admin;
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
}
