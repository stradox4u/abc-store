<?php

namespace App\Models;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity
 * @Table(name="users")
*/

class User
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
  private $balance;

  /**
   * @OneToOne(targetEntity="Cart", mappedBy="user")
  */
  private $cart;

  /**
   * @OneToMany(targetEntity="Rating", mappedBy="user")
  */
  private $ratings;

  public function __construct(string $name, int $balance)
  {
    $this->name = $name;
    $this->balance = $balance;
    $this->ratings = new ArrayCollection();
  }

  public function getCart() 
  {
    return $this->cart;
  }

  public function setCart(Cart $cart)
  {
    $this->cart = $cart;
    $cart->setUser($this);
  }

  public function getUserRatings()
  {
    return $this->ratings;
  }

  public function getName()
  {
    return $this->name;
  }

  public function getBalance()
  {
    return $this->balance;
  }

  public function getId()
  {
    return $this->id;
  }
}

