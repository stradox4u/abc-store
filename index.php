<?php

require_once "bootstrap.php";

use App\Routing\Router;
use App\Routing\Template;

session_start();

$mainTemplate = new Template('main');
$templateData = [
  'title' => 'Landing Page'
];

$router = new Router();
if ($controller = $router->getController())
{
  $content = $controller->handle();
  if ($controller->willRedirect())
  {
    return;
  }
  $templateData['content'] = $content;
  $templateData['title'] = $controller->getTitle();
}

echo $mainTemplate->render($templateData);
