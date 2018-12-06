<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function post_get_link_function()
    {
        $post = $this->createPost();

        $this->assertEquals( $post->getLink(), url("/post/{$post->id}") );
    }
}
