<?php

namespace App\Database\Seeders;

use App\Models\User;

class UserSeeder extends Seeder
{
  private $name;
  private $balance;

  public function __construct(string $name, int $balance)
  {
    $this->name = $name;
    $this->balance = $balance;
  }

  public function storeUser()
  {
    $user = new User($this->name, $this->balance);
    $em = $this->getEmInstance();
    $em->persist($user);
    $em->flush();
  }
}
