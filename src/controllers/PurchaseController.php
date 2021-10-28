<?php

namespace App\Controllers;

use App\Routing\Template;
use App\Singletons\GetEntityManager;

class PurchaseController extends Controller
{
  
  public function handle():string
  {
    if($_SERVER['REQUEST_METHOD'] === 'POST')
    {
      $purchaseTotal = (int) $_POST['total'];
      $emInstance = GetEntityManager::getInstance();
      $em = $emInstance->useEntityManager();

      $user = $em->getRepository('App\Models\User')->find($_SESSION['userdata']['id']);
      $oldBalance = $user->getBalance();

      $user->setBalance($oldBalance - $purchaseTotal);
      $cartItems = $user->getCart()->getCartItems();

      foreach ($cartItems as $item) {
        $user->getCart()->getCartItems()->removeElement($item);
        $item->setCart(null);
      }

      $em->persist($user);
      $em->flush();

      $newBalance = $oldBalance - $purchaseTotal;
      $_SESSION['cartCount'] = 0;

      return (new Template('successPage'))->render([
        'purchaseCost' => $purchaseTotal,
        'oldBalance' => $oldBalance,
        'newBalance' => $newBalance
      ]);
    };
  }
}