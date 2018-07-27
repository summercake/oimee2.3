<?php

namespace App\Observers;

use App\Models\Post;
use App\Jobs\TranslateSlug;
// creating, created, updating, updated, saving,
// saved,  deleting, deleted, restoring, restored
class PostObserver
{
    public function saving(Post $post)
    {
        // XSS 过滤
        $post->body = clean($post->body, 'user_topic_body');
        // 生成话题摘录
        $post->excerpt = make_excerpt($post->body);
        // 如 slug 字段无内容，即使用翻译器对 title 进行翻译
        //if (!$post->slug) {
        //    $post->slug = app(SlugTranslateHandler::class)->translate($post->title);
        //}


    }

    public function saved(Post $post)
    {
        // 如 slug 字段无内容，即使用翻译器对 title 进行翻译
        if ( ! $post->slug) {

            // 推送任务到队列
            dispatch(new TranslateSlug($post));
        }
    }
}