<?php

require_once "../bootstrap.php";

use App\Routing\Api\Router;

$router = new Router();
if ($controller = $router->getController())
{
  $response = $controller->handle();
  echo $response;
  return;
}

http_response_code(500);
echo json_encode(['message' => 'Server error!']);
