<?php

namespace Tests;

use App\Post;
use App\Category;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function createPost()
    {
        return factory(Post::class)->make()->toArray();
    }


    protected function createCategory()
    {
        return factory(Category::class)->create();
    }
}
