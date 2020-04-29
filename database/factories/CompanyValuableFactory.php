<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Models\CompanyValuable;
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

$factory->define(CompanyValuable::class, function (Faker $faker) {
    return [
        'title_ar' => $faker->name,
        'title_en' => $faker->name,
        'desc_ar' => $faker->text(),
        'desc_en' => $faker->text(),
        'icon' => 'https://via.placeholder.com/150',
        'created_at' => now(), 
        'updated_at' => now()
    ];
});
