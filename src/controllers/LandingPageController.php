<?php

namespace App\Controllers;

use App\Routing\Template;
use App\Traits\UseEntityManager;

class LandingPageController extends Controller
{
  use UseEntityManager;

  public function handle(): string
  {
    if(!isset($_SESSION['username']))
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
    $em = $this->getEntityManager();
    $products = $em->getRepository('App\Models\Product')->findAll();
    $allProducts = array_map(function ($product) 
    {
      return array(
        'id' => $product->getId(),
        'name' => $product->getName(),
        'price' => $product->getPrice(),
        'unit' => $product->getUnit(),
        'image' => $product->getImage()
      );
    }, $products);
    return $allProducts;
  }

  private function getUserCart(): int
  {
    $em = $this->getEntityManager();
    $user = $em->getRepository('App\Models\User')->find($_SESSION['userdata']['id']);
    if($user->getCart())
    {
      $cartItems = $user->getCart()->getCartItems()->toArray();
      return count($cartItems);
    } else
    {
      return 0;
    }
  }
}