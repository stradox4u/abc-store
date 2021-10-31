<?php

namespace App\Singletons;

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

class GetEntityManager
{
  private static $instance = null;
  private $entityManager;

  private $paths = array("src/models");
  private $isDevMode = FALSE;
  private $dbParams;

  private function __construct()
  {
    $this->dbParams = array(
      'driver' => 'pdo_mysql',
      'user' => 'root',
      'password' => $_ENV['DB_PASSWORD'],
      'dbname' => $_ENV['DB_NAME']
    );

    $config = Setup::createAnnotationMetadataConfiguration($this->paths, $this->isDevMode);

    $this->entityManager = EntityManager::create($this->dbParams, $config);
  }

  public static function getInstance()
  {
    if (!self::$instance)
    {
      self::$instance = new GetEntityManager;
    }
    return self::$instance;
  }

  public function useEntityManager()
  {
    return $this->entityManager;
  }
}
