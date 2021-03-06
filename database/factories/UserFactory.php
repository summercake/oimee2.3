<?php

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

$factory->define(App\Models\User::class, function (Faker $faker) {
    //$now = Carbon::now()->toDateTimeString();
    // 随机取一个月以内的时间
    $updated_at = $faker->dateTimeThisMonth();
    // 传参为生成最大时间不超过，创建时间永远比更改时间要早
    $created_at = $faker->dateTimeThisMonth($updated_at);
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$tHSYb.IAd2vCjVKzqwiNNeE9fP9pylH1W04rwVBR0/GgneaUaLJoy', // 123456
        'introduction' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'remember_token' => str_random(10),
        'created_at'  => $created_at,
        'updated_at'  => $updated_at,
    ];
});
