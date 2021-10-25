<?php

require_once "vendor/autoload.php";

use Dotenv\Dotenv;
use Config\GetEntityManager;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

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