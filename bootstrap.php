<?php

require_once "vendor/autoload.php";

use App\Singletons\GetEntityManager;
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

$emInstance = GetEntityManager::getInstance();
$entityManager = $emInstance->useEntityManager();
