<?php

namespace App\Models;

/**
 * @Entity
 * @Table(name="shipping")
 */

class Shipping
{
  /** 
   * @Id
   * @Column(type="integer")
   * @GeneratedValue
   */
  private $id;

  /**
   * @Column(type="string")
   */
  private $type;

  /**
   * @Column(type="integer")
   */
  private $cost;

  public function __construct(string $type, int $cost)
  {
    $this->type = $type;
    $this->cost = $cost;
  }

  public function getType()
  {
    return $this->type;
  }

  public function getCost()
  {
    return $this->cost;
  }
}
