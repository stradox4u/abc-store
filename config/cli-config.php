<?php

use App\Singletons\GetEntityManager;
use Doctrine\ORM\Tools\Console\ConsoleRunner;

require_once "./bootstrap.php";

$emInstance = GetEntityManager::getInstance();
$entityManager = $emInstance->useEntityManager();

return ConsoleRunner::createHelperSet($entityManager);