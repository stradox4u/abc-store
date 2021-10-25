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
}