<?php

namespace App\Models;

/**
 * @Entity
 * @Table(name="cart_items")
*/

class CartItem
{
  /** 
   * @Id
   * @Column(type="integer")
   * @GeneratedValue
  */
  private $id;

  /**
   * @Column(type="integer")
  */
  private $quantity;

  /**
   * @ManyToOne(targetEntity="Product", inversedBy="cartItems")
   * @JoinColumn(name="product_id", referencedColumnName="id")
  */
  private $product;

  /**
   * @ManyToOne(targetEntity="Cart", inversedBy="cartItems")
   * @JoinColumn(name="cart_id", referencedColumnName="id")
  */
  private $cart;

  public function setCart(Cart $cart)
  {
    $this->cart = $cart;
  }

  public function setProduct(Product $product)
  {
    $this->product = $product;
  }

  public function setQuantity(int $quantity)
  {
    $this->quantity = $quantity;
  }

  public function getProduct()
  {
    return $this->product;
  }

  public function getQuantity()
  {
    return $this->quantity;
  }
}