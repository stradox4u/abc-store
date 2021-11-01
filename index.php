<?php

// require_once __DIR__ . '/src/controllers/Controller.php';
// require_once __DIR__ . '/src/controllers/LandingPageController.php';
// require_once __DIR__ . '/src/controllers/LoginController.php';
// require_once __DIR__ . '/src/controllers/LogoutController.php';
// require_once __DIR__ . '/src/controllers/PurchaseController.php';
// require_once __DIR__ . '/src/controllers/ShoppingCartController.php';
// require_once __DIR__ . '/src/controllers/api/ApiCartController.php';
// require_once __DIR__ . '/src/controllers/api/RatingController.php';
// require_once __DIR__ . '/src/models/Cart.php';
// require_once __DIR__ . '/src/models/CartItem.php';
// require_once __DIR__ . '/src/models/Product.php';
// require_once __DIR__ . '/src/models/Rating.php';
// require_once __DIR__ . '/src/models/Shipping.php';
// require_once __DIR__ . '/src/models/User.php';
// require_once __DIR__ . '/src/routing/Router.php';
// require_once __DIR__ . '/src/routing/Template.php';
// require_once __DIR__ . '/src/singleton/GetEntityManager.php';
// require_once __DIR__ . '/vendor/doctrine/orm/lib/Doctrine/ORM/Tools/Setup.php';
// require_once __DIR__ . '/vendor/symfony/cache/Adapter/ArrayAdapter.php';
// require_once __DIR__ . '/vendor/symfony/cache/Adapter/AdapterInterface.php';
// require_once __DIR__ . '/vendor/psr/cache/src/CacheItemInterface.php';
// require_once __DIR__ . '/vendor/psr/cache/src/CacheItemPoolInterface.php';

require_once __DIR__ . '/bootstrap.php';

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
