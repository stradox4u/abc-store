<?php

namespace App\Database\Seeders;

  use App\Models\Product;

  class ProductSeeder extends Seeder
  {
    private $name;
    private $price;
    private $unit;

    public function __construct(string $name, int $price, string $unit)
    {
      $this->name = $name;
      $this->price = $price;
      $this->unit = $unit;
    }

    public function storeProduct()
    {
      $product = new Product($this->name, $this->price, $this->unit);
      $em = $this->getEntityManager();
      $em->persist($product);
      $em->flush();
    }
  }