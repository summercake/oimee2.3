<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Post extends Model
{
    protected $table = 'posts';
    protected $fillable = [
        'title',
        'body',
        'user_id',
        'category_id',
        'reply_count',
        'view_count',
        'last_reply_user_id',
        'order',
        'excerpt',
        'slug',
        'validation',
    ];
    protected $casts = [
        'validation' => 'boolean', // validation 是一个布尔类型的字段
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
