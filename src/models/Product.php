<?php

namespace App\Models;

use Doctrine\Common\Collections\ArrayCollection;
use NumberFormatter;

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

  /** @Column(type="string") */
  private $image;

  /**
   * @OneToMany(targetEntity="Rating", mappedBy="product")
  */
  private $ratings;

  /**
   * @OneToMany(targetEntity="CartItem", mappedBy="product")
  */
  private $cartItems;

  public function __construct(string $name, int $price, string $unit, string $image)
  {
    $this->name = $name;
    $this->price = $price;
    $this->unit = $unit;
    $this->image = $image;
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

  public function getName()
  {
    return $this->name;
  }

  public function getPrice()
  {
    return number_format(($this->price / 100), 2, '.');
  }

  public function getUnit()
  {
    return $this->unit;
  }

  public function getImage()
  {
    return $this->image;
  }

  public function getId()
  {
    return $this->id;
  }
}