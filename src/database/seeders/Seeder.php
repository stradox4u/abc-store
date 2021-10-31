<?php

namespace App\Database\Seeders;

use App\Singletons\GetEntityManager;
use App\Traits\UseEntityManager;

class Seeder
{
  protected function getEmInstance()
  {
    $emInstance = GetEntityManager::getInstance();
    $em = $emInstance->useEntityManager();
    return $em;
  }
}
