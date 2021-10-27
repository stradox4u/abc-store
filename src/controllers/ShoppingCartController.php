<?php

namespace App\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Routing\Template;
use App\Routing\ApiTemplate;
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

      $user = $em->getRepository('App\Models\User')->find($_SESSION['userdata']['id']);
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
      $cartItem->setQuantity($prodQty);

      $cartItem->setCart($userCart);
      $cartItem->setProduct($product);
      $userCart->getCartItems()->add($cartItem);

      $em->persist($cartItem);
      $em->flush();

      $cartItems = $user->getCart()->getCartItems();
      $cartItems->map(function($item)
      {
        return [
          'productName' => $item->getProduct()->getName(),
          'quantity' => $item->getQuantity()
        ];
      });

      $cartItems->toArray();

      return '';
    }
  }
}