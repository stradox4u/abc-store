<?php

namespace App\Controllers;

abstract class Controller
{
  private $redirectUri = '';

  abstract public function handle(): string;

  public function getTitle(): string
  {
    return 'ABC.PL Test';
  }

  public function requestRedirect(string $uri)
  {
    $this->redirectUri = $uri;
    header("Location: $uri", true);
  }

  public function willRedirect(): bool
  {
    return strlen($this->redirectUri) > 0;
  }
}