<?php

use Faker\Generator as Faker;

$factory->define(App\Testimonial::class, function (Faker $faker) {
    return [
        'post_id' => rand(0,30),
        'product_id' => rand(0,3),
        'body' => $faker->paragraphs(2, true),
        'author' => $faker->name,
        'link' => $faker->url,
        'publish_at' => \Carbon\Carbon::now(),
        'publish' => 1,
        'created_at' => $faker->dateTimeBetween('-30 days', 'now'),
        'updated_at' => $faker->dateTimeBetween('-30 days', 'now'),
    ];
});
