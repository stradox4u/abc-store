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
}