<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <title><?= ($title ?? '(no-title)'); ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="/src/js/script.js" defer></script>
  <?php header("Access-Control-Allow-Origin: *") ?>
</head>
<body>
  <nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container mx-auto d-flex justify-content-between align-items-baseline">
      <a class="navbar-brand block" href="/"><h1 class="h2">ABC Shop</h1></a>

      <div class="container"></div>
      <div class="container">
        <ul class="nav justify-content-end">
          <?php if(!isset($_SESSION['username']))
          { ?>
            <li class="nav-item">
              <a class="nav-link" href="/login"><h5>Login</h5></a>
            </li>
          <?php } else { ?>
            <li class="nav-item">
              <a class="nav-link" href="/logout"><h5>Logout</h5></a>
            </li>
          <?php } ?>
          <li class="nav-item">
            <a class="nav-link d-flex inline-flex" href="/cart"><h5>Cart</h5>
              <?php if(isset($_SESSION['username']))
              { ?>
                <span class="badge bg-danger align-self-start mx-2
                  <?= $_SESSION['cartCount'] === 0 ? 'invisible' : '' ?>" id="cart_badge">
                  <?php echo $_SESSION['cartCount']; ?>
                </span>

              <?php } ?>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <main class="container bg-light p-4">
    <?php if(isset($content))
      {
        echo $content;
      } else { ?>
    <div class="jumbotron">
      <h1 class="display-4">Hello!</h1>
      <p class="lead">This is the base layout</p>
      <div class="alert alert-warning">
        <p class="lead">No content was provided!</p>
      </div>
    </div>
    <?php } ?>
  </main>
  
</body>
</html>