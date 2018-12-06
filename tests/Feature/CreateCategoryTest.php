<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateCategoryTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function can_create_category()
    {
        $this->login();
        $category = $this->makeCategory();

        $this->post('category', $category)
            ->assertSessionHas('message');
        
        $this->assertDatabaseHas('categories', [
            'name'  => $category['name']
        ]);
    }


    /** @test */
    public function unauthorized_users_cant_create_categories()
    {
        $category = $this->makeCategory();

        $this->post('category', $category)
            ->assertStatus(403);
        
        $this->assertDatabaseMissing('categories', [
            'name'  => $category['name']
        ]);
    }
}
