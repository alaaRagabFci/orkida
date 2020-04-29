<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Models\PestLibrary;
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

$factory->define(PestLibrary::class, function (Faker $faker) {
    return [
        'name_ar' => $faker->name,
        'name_en' => $faker->name,
        'image' => 'https://via.placeholder.com/150',
        'meta_title_ar' => $faker->name(),
        'meta_title_en' => $faker->name(),
        'image_alt' => $faker->name(),
        'description_ar' => $faker->text(),
        'description_en' => $faker->text(),
        'is_active' => $faker->boolean(),
        'sub_pest' => $faker->boolean(),
        'sort' => $faker->unique()->numberBetween(1,50),
        'slug_ar' => $faker->slug(),
        'slug_en' => $faker->slug(),
        'meta_description_ar' => $faker->text(),
        'meta_description_en' => $faker->text(),
        'keywords_ar' => $faker->text(),
        'keywords_en' => $faker->text(),
        'created_at' => now(), 
        'updated_at' => now()
    ];
});
