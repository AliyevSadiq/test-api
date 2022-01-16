<?php

declare(strict_types=1);

namespace App\Service;

use App\Models\Post;

class PostRepository implements InterfaceRepository
{
    public static function getAll(int $limit = 10)
    {
        return Post::paginate($limit);
    }

    public static function save(object $model, array $fields)
    {
        $model->setTitle($fields['title'])
            ->setDescription($fields['description'])
            ->setVideoUrl($fields['video_url']??null)
            ->save();

        return $model;
    }

    public static function delete(object $model)
    {
        $model->delete();
    }
}
