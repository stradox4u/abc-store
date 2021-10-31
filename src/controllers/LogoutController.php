<?php

namespace App\Controllers;

class LogoutController extends Controller
{
  public function handle(): string
  {
    if (session_status() === PHP_SESSION_ACTIVE)
    {
      session_regenerate_id(true);
      session_destroy();
    }

    $this->requestRedirect('/');
    return '';
  }
}
