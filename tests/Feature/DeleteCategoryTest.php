<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DeleteCategoryTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function can_delete_category()
    {
        $this->login();

        $category = $this->createCategory();

        $this->delete("{$category->getLink()}")
            ->assertSessionHas('message');
        
        $this->assertDatabaseMissing('categories', [
            'name'  => $category->name
        ]);
    }


    /** @test */
    public function unauthorized_users_cant_delete_category()
    {
        $category = $this->createCategory();

        $this->delete("{$category->getLink()}")
            ->assertStatus(403);
        
        $this->assertDatabaseHas('categories', [
            'name'  => $category->name
        ]);
    }
}
