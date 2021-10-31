<?php

namespace App\Controllers\Api;

use App\Models\Cart;
use App\Models\CartItem;
use App\Controllers\Controller;
use App\Singletons\GetEntityManager;

class ApiCartController extends Controller
{
  public function handle(): string
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST')
    {
      $params = json_decode(file_get_contents('php://input'));

      $prodId = $params->prodId;
      $prodQty = $params->prodQty;
      $userId = $params->userId;

      $cartArray = $this->addToCart($prodId, $prodQty, $userId);

      $_SESSION['cartCount'] = count($cartArray);
      return json_encode($cartArray);
    }
    elseif ($_SERVER['REQUEST_METHOD'] === 'PATCH')
    {
      $params = json_decode(file_get_contents('php://input'));
      $prodId = $params->prodId;
      $prodQty = $params->qty;
      $userId = $params->userId;

      $emInstance = GetEntityManager::getInstance();
      $em = $emInstance->useEntityManager();

      $user = $em->getRepository('App\Models\User')->find($userId);
      $userCartItems = $user->getCart()->getCartItems();
      $relevantItemArray = $userCartItems->filter(function ($item) use ($prodId)
      {
        return $item->getProduct()->getId() == $prodId;
      });
      $relevantItem = $relevantItemArray->first();
      $relevantItem->setQuantity($prodQty);
      $em->persist($relevantItem);
      $em->flush();

      http_response_code(200);
      return json_encode(['message' => 'Success']);
    }
  }

  private function addToCart(int $prodId, int $prodQty, int $userId)
  {
    $emInstance = GetEntityManager::getInstance();
    $em = $emInstance->useEntityManager();
    // Find Logged in User and their cart (Create a cart if the user doesn't have one)
    $user = $em->getRepository('App\Models\User')->find($userId);
    $userCart = $user->getCart();
    if (!$userCart)
    {
      $cart = new Cart();
      $user->setCart($cart);
      $em->persist($cart);
      $userCart = $user->getCart();
    }

    // Find the product and attach it to the user's cart
    $product = $em->getRepository('App\Models\Product')->find($prodId);
    $oldCartItems = $userCart->getCartItems();
    $cartItem = new CartItem();
    $filtered = $oldCartItems->filter(function ($element) use ($product)
    {
      return $element->getProduct()->getName() == $product->getName();
    });
    if (!$filtered->isEmpty())
    {
      $oldQty = $filtered->first()->getQuantity();
      $filtered->first()->setQuantity($oldQty + $prodQty);
      $em->persist($userCart);
      $em->flush();
    }
    else
    {
      $userCart->getCartItems()->add($cartItem);
      $cartItem->setQuantity($prodQty);
      $cartItem->setProduct($product);
      $cartItem->setCart($userCart);
      $em->persist($cartItem);
      $em->persist($userCart);
      $em->flush();
    }

    // After update, get the user's updated cart
    $cartItems = $userCart->getCartItems();

    // A Doctrine collection is returned rather than an array, so to filter it:
    $cartArray = [];
    foreach ($cartItems as $item)
    {
      array_push($cartArray, [
        'name' => $item->getProduct()->getName(),
        'quantity' => $item->getQuantity()
      ]);
    }

    return $cartArray;
  }
}
