<?php

use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Config\GetEntityManager;

require_once "./bootstrap.php";

$getEm = new GetEntityManager();
$entityManager = $getEm->getEntityManager();

return ConsoleRunner::createHelperSet($entityManager);