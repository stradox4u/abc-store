<?php

namespace App\Singletons;

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

// require_once __DIR__ . '/../../vendor/doctrine/orm/lib/Doctrine/ORM/EntityManager.php';
// require_once __DIR__ . '/../../vendor/doctrine/dbal/src/DriverManager.php';

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
      'user' => $_ENV['DB_USER'],
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
