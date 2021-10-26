<?php
/** @var array $products  */
/** @var string $user  */
?>

<div>
  <?php foreach ($products as $product) 
  { ?>
    <div class="card-body">
      <h5 class="card-title"><?php echo $product['name'] ?><h5>
    </div>
  <?php } ?>
  <h3>Still Working!</h3>
</div>