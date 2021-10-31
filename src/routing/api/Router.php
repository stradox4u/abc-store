<?php

namespace App\Routing\Api;

use App\Controllers\Controller;
use App\Controllers\Api\ApiCartController;
use App\Controllers\Api\RatingController;

class Router
{
  public function getController(): ?Controller
  {
    switch ($_SERVER['PATH_INFO'] ?? '/')
    {
      case '/cart':
        return new ApiCartController();
        break;
      case '/rating':
        return new RatingController();
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
