<?php

namespace App\Database;

use App\Database\Seeders\ProductSeeder;
use App\Database\Seeders\ShippingMethodSeeder;
use App\Database\Seeders\UserSeeder;

class DatabaseSeeder
{
  public function __construct(array $products, array $users, array $shippingMethods)
  {
    $this->products = $products;
    $this->users = $users;
    $this->shippingMethods = $shippingMethods;
  }

  private function seedProducts()
  {
    foreach ($this->products as $product)
    {
      $prodModel = new ProductSeeder($product['name'], $product['price'], $product['unit'], $product['image']);
      $prodModel->storeProduct();
    }
  }

  private function seedUsers()
  {
    foreach ($this->users as $user)
    {
      $userModel = new UserSeeder($user['name'], $user['balance']);
      $userModel->storeUser();
    }
  }

  private function seedShippingMethods()
  {
    foreach ($this->shippingMethods as $shippingMethod)
    {
      $shippingMethodModel = new ShippingMethodSeeder($shippingMethod['type'], $shippingMethod['cost']);
      $shippingMethodModel->storeShippingMethod();
    }
  }

  public function seedDatabase()
  {
    $this->seedProducts();
    $this->seedUsers();
    $this->seedShippingMethods();
  }
}
