<?php

namespace Tests;

use App\Post;
use App\Admin;
use App\Category;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function createPost()
    {
        return factory(Post::class)->create();
    }


    protected function createCategory()
    {
        return factory(Category::class)->create();
    }


    protected function makePost()
    {
        return factory(Post::class)->make()->toArray();
    }


    protected function makeCategory()
    {
        return factory(Category::class)->make()->toArray();
    }


    protected function createAdmin()
    {
        return factory(Admin::class)->create();
    }


    protected function login()
    {
        $admin = $this->createAdmin();

        $this->be($admin);

        return $admin;
    }
}
