<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Models\ArticleType;
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

$factory->define(ArticleType::class, function (Faker $faker) {
    return [
        'category' => $faker->name,
        'is_active' => $faker->boolean(),
        'slug' => $faker->slug(),
        'created_at' => now(), 
        'updated_at' => now()
    ];
});
