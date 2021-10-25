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
}