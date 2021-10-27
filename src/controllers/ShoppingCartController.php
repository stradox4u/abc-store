<?php

namespace App\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Routing\Template;
use App\Traits\UseEntityManager;

class ShoppingCartController extends Controller
{
  use UseEntityManager;

  public function handle(): string
  {
    if($_SERVER['REQUEST_METHOD'] === 'POST')
    {
      $em = $this->getEntityManager();
      $params = json_decode(file_get_contents('php://input'));

      $prodId = $params->prodId;
      $prodQty = $params->prodQty;
      $userId = $params->userId;

      $user = $em->getRepository('App\Models\User')->find($userId);
      $userCart = $user->getCart();
      if(!$userCart)
      {
        $cart = new Cart();
        $user->setCart($cart);
        $em->persist($cart);
        $userCart = $user->getCart();
      }

      $product = $em->getRepository('App\Models\Product')->find($prodId);
      $cartItem = new CartItem();
      $user->getCart()->getCartItems()->add($cartItem);
      $cartItem->setQuantity($prodQty);
      $cartItem->setProduct($product);
      $cartItem->setCart($userCart);


      $em->persist($cartItem);
      $em->persist($userCart);
      $em->flush();
      
      $cartItems = $userCart->getCartItems();
      $cartArray = [];
      foreach ($cartItems as $item) {
        array_push($cartArray, [
          'name' => $item->getProduct()->getName(),
          'quantity' => $item->getQuantity()
        ]);
      }
      return json_encode($cartArray);
    }
  }
}