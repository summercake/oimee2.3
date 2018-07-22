<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Advertisement extends Model
{
    protected $table = 'advertisements';
    protected $fillable = [
        'dis_or_adv',
        'category_id',
        'company_id',
        'title',
        'introduction',
        'description',
        'cover_image',
        'link',
        'second_link',
        'original_price',
        'final_price',
        'actual_charge_price',
        'discount_rate',
        'promotion_code',
        'start_date',
        'valid_to_date',
        'display_valid_to_date',
        'validation'
    ];

    protected $casts = [
        'validation' => 'boolean', // on_sale 是一个布尔类型的字段
    ];
}
