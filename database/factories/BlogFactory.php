<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Models\Blog;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Blog::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'image' => 'https://via.placeholder.com/150',
        'meta_title' => $faker->name(),
        'image_alt' => $faker->name(),
        'description_ar' => $faker->text(),
        'is_active' => $faker->boolean(),
        'sort' => $faker->unique()->numberBetween(1,50),
        'slug' => $faker->slug(),
        'meta_description' => $faker->text(),
        'article_id' => factory(App\Models\ArticleType::class),
        'keywords' => $faker->text(),
        'created_at' => now(), 
        'updated_at' => now()
    ];
});
