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
