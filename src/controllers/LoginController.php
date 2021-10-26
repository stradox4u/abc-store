<?php

namespace App\Controllers;

use App\Routing\Template;
use App\Traits\UseEntityManager;

class LoginController extends Controller
{
  use UseEntityManager;

  public function handle(): string
  {
    if(isset($_SESSION['username']))
    {
      $this->requestRedirect('/');
      return '';
    }

    $formError = [];
    if($_SERVER['REQUEST_METHOD'] === 'POST')
    {
      $formUsername = $_POST['username'] ?? '';
      $userData = $this->loginUser($formUsername);
      if(!$userData)
      {
        $formError = ['username' => sprintf('The username [%s] was not found.', $formUsername)];
      } else 
      {
        $_SESSION['username'] = $formUsername;
        $_SESSION['userdata'] = $userData;
        $this->requestRedirect('/');
        return '';
      }
    }

    return (new Template('loginForm'))->render([
      'formError' => $formError,
      'formUsername' => $formUsername ?? ''
    ]);
  }

  private function loginUser(string $username): ?array
  {
    $em = $this->getEntityManager();
    $user = $em->getRepository('App\Models\User')
      ->findOneBy(array('name' => $username));
    var_dump($user->getName());
    return ['name' => $user->getName(), 'balance' => $user->getBalance()] ?? null;
  }
}