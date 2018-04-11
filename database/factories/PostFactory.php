<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'user_id' => 1,
        'category_id' => 5,
        'product_id' => rand(1,3),
        'title' => $faker->sentence(5),
        'slug' => str_slug($faker->sentence(5)),
        'short' => $faker->paragraphs(1, true),
        'body' => $faker->paragraphs(2, true),
        'image' => 'themes/wellmedic/images/demo/tile-img.jpg',
        'publish_at' => \Carbon\Carbon::now(),
        'publish' => 1,
        'created_at' => $faker->dateTimeBetween('-30 days', 'now'),
        'updated_at' => $faker->dateTimeBetween('-30 days', 'now'),
    ];
});
