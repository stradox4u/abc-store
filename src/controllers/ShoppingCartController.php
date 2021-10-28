<?php

namespace App\Controllers;

use App\Routing\Template;
use App\Singletons\GetEntityManager;

class ShoppingCartController extends Controller
{
  public function handle(): string
  {
    if(!isset($_SESSION['username']))
    {
      $this->requestRedirect('/login');
      return '';
    }

    if($_SERVER['REQUEST_METHOD'] === 'GET')
    {
      $cartResult = $this->getUserCart($_SESSION['userdata']['id']);
      $cartArray = $cartResult['cartArray'];
      $subtotals = $cartResult['subtotals'];
      $balance = $cartResult['balance'];
      
      return (new Template('cartPage'))->render([
        'cart' => $cartArray,
        'user' => $_SESSION['userdata'],
        'total' => array_sum($subtotals),
        'balance' => $balance
      ]);
    } 
  }
  
  private function getUserCart($id)
  {
    $emInstance = GetEntityManager::getInstance();
    $em = $emInstance->useEntityManager();
    
    $user = $em->getRepository('App\Models\User')->find($id);
    $userCartItems = $user->getCart()->getCartItems();
    $balance = $user->getBalance();
    
    // A Doctrine collection is returned rather than an array, so to filter it:
    $cartArray = [];
    $subtotals = [];
    foreach ($userCartItems as $item) 
    {
      array_push($cartArray, [
        'name' => $item->getProduct()->getName(),
        'price' => $item->getProduct()->getPrice(),
        'unit' => $item->getProduct()->getUnit(),
        'image' => $item->getProduct()->getImage(),
        'id' => $item->getProduct()->getId(),
        'quantity' => $item->getQuantity()
      ]);
      
      array_push($subtotals, $item->getQuantity() * $item->getProduct()->getPrice());
    }

    return ['cartArray' => $cartArray, 'subtotals' => $subtotals, 'balance' => $balance];
  }
}