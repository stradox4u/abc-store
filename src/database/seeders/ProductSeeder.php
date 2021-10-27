<?php

namespace App\Database\Seeders;

  use App\Models\Product;

  class ProductSeeder extends Seeder
  {
    private $name;
    private $price;
    private $unit;
    private $image;

    public function __construct(string $name, int $price, string $unit, string $image)
    {
      $this->name = $name;
      $this->price = $price;
      $this->unit = $unit;
      $this->image = $image;
    }

    public function storeProduct()
    {
      $product = new Product($this->name, $this->price, $this->unit, $this->image);
      $em = $this->getEntityManager();
      $em->persist($product);
      $em->flush();
    }
  }