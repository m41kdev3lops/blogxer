<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'title'                 => $faker->sentence,
        'category_id'           => 1,
        'body'                  => $faker->text(1500),
        'short_description'     => $faker->sentence,
        'is_published'          => 1
    ];
});
