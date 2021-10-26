<?php

namespace App;
require_once "bootstrap.php";
use App\Database\DatabaseSeeder;

$products = [
  [
    'name' => 'apple',
    'price' => 30,
    'unit' => 'piece',
    'image' => 'https://images.unsplash.com/photo-1560806887-1e4cd0b6cbd6?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=600&h=600&q=80'
  ],
  [
    'name' => 'beer',
    'price' => 200,
    'unit' => 'bottle',
    'image' => 'https://images.unsplash.com/photo-1618885472179-5e474019f2a9?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=600&h=600&q=80'
  ],
  [
    'name' => 'water',
    'price' => 100,
    'unit' => 'bottle',
    'image' => 'https://images.unsplash.com/photo-1616118132534-381148898bb4?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=600&h=600&q=80'
  ],
  [
    'name' => 'cheese',
    'price' => 374,
    'unit' => 'kg',
    'image' => 'https://images.unsplash.com/photo-1552767059-ce182ead6c1b?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=600&h=600&q=80'
  ]
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