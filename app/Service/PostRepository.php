<?php

declare(strict_types=1);

namespace App\Service;


class PostRepository implements InterfaceRepository
{

    public function save($model, $fields)
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
