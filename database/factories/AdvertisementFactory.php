<?php

use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(App\Models\Advertisement::class, function (Faker $faker) {
    $now = Carbon::now()->toDateTimeString();
    // 随机取一个月以内的时间
    $updated_at = $faker->dateTimeThisMonth();
    // 传参为生成最大时间不超过，创建时间永远比更改时间要早
    $created_at = $faker->dateTimeThisMonth($updated_at);
    return [
        'dis_or_adv' => $faker->randomElement([0,1]),
        'category_id' => $faker->numberBetween($min = 1, $max = 100),
        'tag_id' => $faker->numberBetween($min = 1, $max = 100),
        'company_id' => $faker->numberBetween($min = 1, $max = 100),
        'location_id' => $faker->numberBetween($min = 1, $max = 100),
        'title' => $faker->sentence($nbWords = 4, $variableNbWords = true),
        'introduction' => $faker->sentences($nb = 3, $asText = true),
        'description' => $faker->paragraphs($nb = 5, $asText = true),
        'cover_image' => '/images/transparent-goods2.png',
        'original_price' => 199.99,
        'final_price' => 99.99,
        'actual_charge_price' => 99.99,
        'discount_rate' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 1),
        'promotion_code' => str_random(6),
        'start_date' => $now,
        'valid_to_date' => $now,
        'display_valid_to_date' => $now,
        'validation' => true,
        'created_at'  => $created_at,
        'updated_at'  => $updated_at,
    ];
});
