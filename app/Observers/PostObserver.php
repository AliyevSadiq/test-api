<?php

namespace App\Observers;

use App\Models\Post;
use Carbon\Carbon;

class PostObserver
{
    /**
     * Handle the Post "created" event.
     *
     * @param  \App\Models\Post  $post
     * @return void
     */
    public function created(Post $post)
    {
        $post->published_at=Carbon::parse($post->created_at)->addDay();
        $post->save();
    }
}
