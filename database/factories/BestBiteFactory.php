<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Models\PestBite;
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

$factory->define(PestBite::class, function (Faker $faker) {
    return [
        'pest_type_ar' => $faker->name,
        'pest_type_en' => $faker->name,
        'insect_bites_ar' => $faker->text(),
        'insect_bites_en' => $faker->text(),
        'notes_ar' => $faker->text(),
        'notes_en' => $faker->text(),
        'sting_appearance_ar' => $faker->name,
        'sting_appearance_en' => $faker->name,
        'image' => 'uploads/pest_bites/article.png',
        'created_at' => now(), 
        'updated_at' => now()
    ];
});
