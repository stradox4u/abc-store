<?php

namespace App\Models;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity
 * @Table(name="products")
*/

class Product
{
  /** 
   * @Id
   * @Column(type="integer")
   * @GeneratedValue
  */
  private $id;

  /** @Column(type="string") */
  private $name;

  /** @Column(type="integer") */
  private $price;

  /** @Column(type="string") */
  private $unit;

  /**
   * @OneToMany(targetEntity="Rating", mappedBy="product")
  */
  private $ratings;

  /**
   * @OneToMany(targetEntity="CartItem", mappedBy="product")
  */
  private $cartItems;

  public function __construct()
  {
    $this->ratings = new ArrayCollection();
    $this->cartItems = new ArrayCollection();
  }

  public function getProductRatings()
  {
    return $this->ratings;
  }

  public function getProductCartItems()
  {
    return $this->cartItems;
  }
}