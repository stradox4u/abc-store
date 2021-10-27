<?php

namespace App\Traits;

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

trait UseEntityManager
{
  public function getEntityManager()
  {
    $paths = array("src/models");
    $isDevMode = FALSE;

    $dbParams = array(
      'driver' => 'pdo_mysql',
      'user' => 'root',
      'password' => $_ENV['DB_PASSWORD'],
      'dbname' => $_ENV['DB_NAME']
    );

    $config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
  
    return EntityManager::create($dbParams, $config);
  }
}