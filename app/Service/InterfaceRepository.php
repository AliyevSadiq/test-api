<?php

namespace App\Service;

interface InterfaceRepository
{
   public function save($model,$fields);
   public function delete($model);
}
