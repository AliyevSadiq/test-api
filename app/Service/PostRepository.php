<?php

declare(strict_types=1);

namespace App\Service;

use App\Models\Post;

class PostRepository implements InterfaceRepository
{
    public function getAll(int $limit = 10)
    {
        return Post::paginate($limit);
    }

    public function save($model, array $fields)
    {
        $model->setTitle($fields['title'])
            ->setDescription($fields['description'])
            ->save();

        return $model;
    }

    public function delete($model)
    {
        $model->delete();
    }
}
