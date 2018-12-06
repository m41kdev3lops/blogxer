<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoryTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function get_link_works_correctly()
    {
        $category = $this->createCategory();

        $this->assertEquals( $category->getLink(), url("/category/{$category->id}") );
    }
}
