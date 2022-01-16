<?php

declare(strict_types=1);

namespace App\Service;

interface InterfaceRepository
{
    public static function getAll(int $limit = 10);

    public static function save(object $model, array $fields);

    public static function delete(object $model);
}
