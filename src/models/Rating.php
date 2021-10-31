<?php

namespace App\Models;

/**
 * @Entity
 * @Table(name="ratings")
 */

class Rating
{
  /** 
   * @Id
   * @Column(type="integer")
   * @GeneratedValue
   */
  private $id;

  /** @Column(type="integer") */
  private $rating;

  /**
   * @ManyToOne(targetEntity="User", inversedBy="ratings")
   * @JoinColumn(name="user_id", referencedColumnName="id")
   */
  private $user;

  /**
   * @ManyToOne(targetEntity="Product", inversedBy="ratings")
   * @JoinColumn(name="product_id", referencedColumnName="id")
   */
  private $product;

  public function __construct(int $rating)
  {
    $this->rating = $rating;
  }

  public function getRating()
  {
    return $this->rating;
  }

  public function getProduct()
  {
    return $this->product;
  }

  public function getUser()
  {
    return $this->user;
  }

  public function setUser(User $user)
  {
    $this->user = $user;
  }

  public function setProduct(Product $product)
  {
    $this->product = $product;
  }
}
