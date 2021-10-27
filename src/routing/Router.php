<?php

namespace App\Routing;

use App\Controllers\Controller;
use App\Controllers\LandingPageController;
use App\Controllers\LoginController;
use App\Controllers\LogoutController;
use App\Controllers\ShoppingCartController;

class Router
{
  public function getController(): ?Controller
  {
    switch($_SERVER['PATH_INFO'] ?? '/')
    {
      case '/login':
        return new LoginController();
        break;
      case '/logout':
        return new LogoutController();
        break;
      case '/':
        return new LandingPageController();
        break;
      case '/cart':
        return new ShoppingCartController();
        break;
      case '/success':
        return new Success();
        break;
      default:
        return new class extends Controller
        {
          public function handle(): string
          {
            $this->requestRedirect('/');
            return '';
          }
        };
    }
  }
}