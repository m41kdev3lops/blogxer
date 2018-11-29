<?php

use Illuminate\Database\Seeder;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category1 = factory(App\Category::class)->create();

        factory(App\Post::class, 5)->create([
            'category_id' => $category1->id
        ]);

        $category2 = factory(App\Category::class)->create();

        factory(App\Post::class, 5)->create([
            'category_id' => $category2->id
        ]);
    }
}
