<?php

namespace App\Routing;

class ApiTemplate
{
  public static $viewsPath = __DIR__ . '/../templates';

  private $data;

  public function __construct(string $data)
  {
    $this->data = $data;
  }

  function returnJson()
  {
    echo (string) $this->data;
    return '';
  }
}
