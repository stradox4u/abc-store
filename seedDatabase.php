<?php

namespace App;
require_once "bootstrap.php";
use App\Database\DatabaseSeeder;

$products = [
  ['name' => 'apple', 'price' => 30, 'unit' => 'piece'],
  ['name' => 'beer', 'price' => 200, 'unit' => 'bottle'],
  ['name' => 'water', 'price' => 100, 'unit' => 'bottle'],
  ['name' => 'cheese', 'price' => 374, 'unit' => 'kg']
];

$users = [
  ['name' => 'First User', 'balance' => 10000],
  ['name' => 'Second User', 'balance' => 10000]
];

$shippingMethods = [
  ['type' => 'pick-up', 'cost' => 0],
  ['type' => 'UPS', 'cost' => 500]
];

$seeder = new DatabaseSeeder($products, $users, $shippingMethods);
$seeder->seedDatabase();