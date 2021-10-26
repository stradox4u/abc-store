<?php

namespace App\Routing;

use App\Controllers\Controller;
use App\Controllers\LandingPageController;
use App\Controllers\LoginController;

class Router
{
  public function getController(): ?Controller
  {
    switch($_SERVER['PATH_INFO'] ?? '/')
    {
      case '/login':
        return new LoginController();
        break;
      case '/':
        return new LandingPageController();
        break;
      case '/cart':
        return new Cart();
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