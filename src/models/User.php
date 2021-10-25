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

  public function __construct()
  {
    $this->ratings = new ArrayCollection();
  }

  public function getCart() 
  {
    return $this->cart;
  }
}

