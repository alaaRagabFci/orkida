<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Models\Faq;
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

$factory->define(Faq::class, function (Faker $faker) {
    return [
        'description_ar' => $faker->name,
        'description_en' => $faker->name,
        'question_ar' => $faker->text(),
        'question_en' => $faker->text(),
        'is_active' => $faker->boolean(),
        'is_common' => $faker->boolean(),
        'slug_ar' => $faker->slug(),
        'slug_en' => $faker->slug(),
        'question_category_id' => $faker->numberBetween(1, 4),
        'created_at' => now(), 
        'updated_at' => now()
    ];
});
