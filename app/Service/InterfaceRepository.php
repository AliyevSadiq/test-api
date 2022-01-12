<?php

declare(strict_types=1);

namespace App\Service;

interface InterfaceRepository
{
    public function getAll(int $limit = 10);

    public function save(object $model, array $fields);

    public function delete($model);
}
