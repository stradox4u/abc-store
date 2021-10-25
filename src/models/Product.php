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

  public function __construct()
  {
    $this->ratings = new ArrayCollection();
  }
}