<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Common\Enums\GenderEnum;
use App\Models\User;
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

$factory->define(User::class, function (Faker $faker) {
    return [
        'username' => $faker->unique(false, 1000000)->name,
        'password' => bcrypt('123456'),
        'nickname' => $faker->name,
        'head_portrait' => $faker->imageUrl(),
        'gender' => array_rand(GenderEnum::getMap()),
        'email' => $faker->unique(false, 1000000)->safeEmail,
        'mobile' => $faker->unique(false, 1000000)->phoneNumber,
        'last_ip' => $faker->ipv4,
        'created_at' => now(),
        'updated_at' => now(),
    ];
});
