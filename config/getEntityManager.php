<?php
namespace Config;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;

class GetEntityManager
{
  public $paths;
  public $isDevMode;

  public $dbParams;

  public function __construct($paths, $isDevMode, $dbParams)
  {
    $this->paths = $paths;
    $this->isDevMode = $isDevMode;
    $this->dbParams = $dbParams;
  }

  private function configure()
  {
    $config = Setup::createAnnotationMetadataConfiguration($this->paths, $this->isDevMode); 
    return $config; 
  }

  public function getEntityManager()
  {
    return EntityManager::create($this->dbParams, $this->configure());
  }
}

?>