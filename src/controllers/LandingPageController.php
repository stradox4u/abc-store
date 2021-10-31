<?php

namespace App\Controllers;

use App\Routing\Template;
use App\Singletons\GetEntityManager;

class LandingPageController extends Controller
{
  public function handle(): string
  {
    if (!isset($_SESSION['username']))
    {
      $this->requestRedirect('/login');
      return '';
    }

    $allProducts = $this->getProducts();
    $cartCount = $this->getUserCart();
    $_SESSION['cartCount'] = $cartCount;
    return (new Template('landingPage'))->render([
      'products' => $allProducts,
      'user' => $_SESSION['userdata'],
    ]);
  }

  private function getProducts(): array
  {
    $emInstance = GetEntityManager::getInstance();
    $em = $emInstance->useEntityManager();
    $products = $em->getRepository('App\Models\Product')->findAll();
    $allProducts = array_map(function ($product)
    {
      $ratings = $product->getProductRatings();
      $ratingsArray = [];
      foreach($ratings as $rating)
      {
        array_push($ratingsArray, $rating->getRating());
      }

      $avg_rating = 0;
      if(count($ratingsArray) > 0)
      {
        $avg_rating = array_sum($ratingsArray) / count($ratingsArray);
      }
      else 
      {
        $avg_rating = 5;
      }
      return array(
        'id' => $product->getId(),
        'name' => $product->getName(),
        'price' => $product->getPrice(),
        'unit' => $product->getUnit(),
        'image' => $product->getImage(),
        'avg_rating' => $avg_rating,
        'rating_count' => count($ratingsArray)
      );
    }, $products);
    return $allProducts;
  }

  private function getUserCart(): int
  {
    $emInstance = GetEntityManager::getInstance();
    $em = $emInstance->useEntityManager();
    $user = $em->getRepository('App\Models\User')->find($_SESSION['userdata']['id']);
    if ($user->getCart())
    {
      $cartItems = $user->getCart()->getCartItems()->toArray();
      return count($cartItems);
    }
    else
    {
      return 0;
    }
  }
}
