<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use App\Message;
use Illuminate\Support\Str;
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
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '12345678', // password
        'remember_token' => Str::random(10),
    ];
});

$factory->define(Message::class, function (Faker $faker) {

    do{
        $user_from = rand(1, 15);
        $user_to = rand(1, 15);
    }while($user_from == $user_to);
    return [
        'user_from' => $user_from,
        'User_to' => $user_to,
        'message' => $faker->sentence,
    ];
});
