<?php

namespace App\Routing\Api;

use App\Controllers\Controller;
use App\Controllers\ShoppingCartController;

class Router
{
  public function getController(): ?Controller
  {
    switch($_SERVER['PATH_INFO'] ?? '/')
    {
      case '/cart':
        return new ShoppingCartController();
        break;
      default:
        return new class extends Controller
        {
          public function handle(): string
          {
            echo json_encode(['messageZoom' => 'Server error!']);
            return '';
          }
        };
    }
  }
}