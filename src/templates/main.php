<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <title><?= ($title ?? '(no-title)'); ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
  <nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container mx-auto d-flex justify-content-between align-items-baseline">
      <a class="navbar-brand block" href="/"><h1 class="h2">ABC Coding Test</h1></a>

      <div class="container"></div>
      <div class="container">
        <ul class="navbar nav-pills">
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
            <a class="nav-link" href="/cart"><h5>Cart</h5></a>
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