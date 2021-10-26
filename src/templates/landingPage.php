<?php
/** @var array $products  */
/** @var string $user  */
?>

<div class="container">
  <div class="row row-cols-2">
    <?php foreach ($products as $product) 
    { ?>
      <div class="p-3">
        <div class="card">
          <img src="<?= $product['image'] ?>" alt="<?= $product['name'] ?> image" 
            origin="anonymous" class="img-fluid w-100" style="object-fit: cover;">
          <div class="card-body">
            <h5 class="card-title text-capitalize"><?php echo $product['name'] ?><h5>
          </div>
          <div class="card-text p-3">
            <h6 class="text-secondary">Price: &#36; <?php echo ($product['price'] / 100) ?></h6>
            <form action="/cart" method="POST">
              <input type="hidden" name="prodId" value="<?= $product['id'] ?>">
              <div class="d-grid gap-2">
                <button class="btn btn-primary btn-sm mt-3">Add To Cart</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    <?php } ?>
  </div>
</div>