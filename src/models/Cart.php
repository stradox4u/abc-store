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
   * @ManyToMany(targetEntity="Product")
   * @JoinTable(name="carts_products",
   *  joinColumns={@JoinColumn(name="cart_id", referencedColumnName="id")},
   *  inverseJoinColumns={@JoinColumn(name="product_id", referencedColumnName="id")}
   * )
  */
  private $products;

  public function __construct()
  {
    $this->products = new ArrayCollection();
  }

  public function getProducts()
  {
    return $this->products;
  }
}