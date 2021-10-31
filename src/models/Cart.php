<?php

namespace App\Models;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity
 * @Table(name="carts")
 */

class Cart
{
  /** 
   * @Id
   * @Column(type="integer")
   * @GeneratedValue
   */
  private $id;

  /**
   * @OneToOne(targetEntity="User", inversedBy="cart")
   * @JoinColumn(name="user_id", referencedColumnName="id")
   */
  private $user;

  /**
   * @var Collection
   * @OneToMany(targetEntity="CartItem", mappedBy="cart")
   * 
   */
  private $cartItems;

  public function __construct()
  {
    $this->cartItems = new ArrayCollection();
  }

  public function getCartItems()
  {
    return $this->cartItems;
  }

  public function setUser(User $user)
  {
    $this->user = $user;
  }

  public function getId()
  {
    return $this->id;
  }
}
