<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Advertisement extends Model
{
    protected $table = 'advertisements';
    protected $fillable = [
        'dis_or_adv',
        'category_id',
        'tag_id',
        'company_id',
        'location_id',
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
        'validation' => 'boolean', // validation 是一个布尔类型的字段
    ];

    public function category(){
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function scopeAdvertisement($query)
    {
        return $query->where('dis_or_adv', '=', 1);
    }

    public function scopeDiscount($query)
    {
        return $query->where('dis_or_adv', '=', 0);
    }
}
