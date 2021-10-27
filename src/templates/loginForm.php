<?php
/** @var array $formError  */
/** @var string $formUsername  */
?>

<div class="d-flex flex-column justify-content-center align-items-center">
  <form action="/login" method="POST">
    <div class="text-center mb-4">
      <h1 class="h3 mb-3 mt-5 font-weight-normal">Login</h1>
    </div>

    <div class="form-label-group mb-3">
      <label for="userName" class="h-4">User Name:</label>
      <input type="text" name="username" id="inputUser" placeholder="User Name"
        value="<?= htmlentities($formUsername ?? '') ?>" class="form-control">
      <?php if(isset($formError['username']))
      {
        echo sprintf('<div class="text-danger">%s</div>', htmlentities($formError['username']));
      } ?>
    </div>
    <div class="d-grid gap-2">
      <button type="submit" class="btn btn-lg btn-info btn-block">Login</button>
    </div>
  </form>
</div>