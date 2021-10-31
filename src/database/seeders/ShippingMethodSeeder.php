<?php

namespace App\Database\Seeders;

use App\Models\Shipping;

class ShippingMethodSeeder extends Seeder
{
  private $type;
  private $cost;

  public function __construct(string $type, int $cost)
  {
    $this->type = $type;
    $this->cost = $cost;
  }

  public function storeShippingMethod()
  {
    $shippingMethod = new Shipping($this->type, $this->cost);
    $em = $this->getEmInstance();
    $em->persist($shippingMethod);
    $em->flush();
  }
}
