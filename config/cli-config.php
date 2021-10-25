<?php

use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Config\GetEntityManager;

require_once "./bootstrap.php";

$paths = array("src/models");
$isDevMode = false;

$dbParams = array(
  'driver' => 'pdo_mysql',
  'user' => 'root',
  'password' => $_ENV['DB_PASSWORD'],
  'dbname' => $_ENV['DB_NAME'],
);

$entityManagerSetup = new GetEntityManager($paths, $isDevMode, $dbParams);
$entityManager = $entityManagerSetup->getEntityManager();

return ConsoleRunner::createHelperSet($entityManager);