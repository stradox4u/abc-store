<?php

require_once "vendor/autoload.php";

use Dotenv\Dotenv;
use Config\GetEntityManager;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

$getEm = new GetEntityManager();
$entityManager = $getEm->getEntityManager();