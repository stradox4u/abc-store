<?php

namespace App\Routing\Api;

use App\Controllers\Controller;
use App\Controllers\Api\ApiCartController;

class Router
{
  public function getController(): ?Controller
  {
    switch ($_SERVER['PATH_INFO'] ?? '/')
    {
      case '/cart':
        return new ApiCartController();
        break;
      default:
        return new class extends Controller
        {
          public function handle(): string
          {
            echo json_encode(['message' => 'Server error!']);
            return '';
          }
        };
    }
  }
}
