<?php

namespace App\Service;

interface InterfaceRepository
{
    public function getAll(int $limit = 10);

    public function save($model, array $fields);

    public function delete($model);
}
