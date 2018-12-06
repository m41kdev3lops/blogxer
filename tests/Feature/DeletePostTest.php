<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DeletePostTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function posts_can_be_deleted_successfully()
    {
        $post = $this->createPost();
        
        $this->login();

        $this->delete("post/{$post->id}");

        $this->assertDatabaseMissing('posts', [
            'title'                     => $post->title,
            'short_description'         => $post->short_description,
            'body'                      => $post->body
        ]);
    }


    /** @test */
    public function posts_cant_be_deleted_by_unauthorized_users()
    {
        $post = $this->createPost();
        
        $this->delete("post/{$post->id}")
            ->assertStatus(403);
        
        $this->assertDatabaseHas('posts', [
            'title'                     => $post->title,
            'short_description'         => $post->short_description,
            'body'                      => $post->body
        ]);
    }
}
