<?php
/** @var array $products  */
/** @var array $user  */
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
            <div class="w-100 mt-2" id="<?= $product['id'] ?>-stars">
              <?php for($i = 0; $i < 5; $i++)
              { ?>
                <input type="image" src="/src/assets/rating-star.svg" alt="star-image"
                  style="height: 24px; width: 24px;" class="me-2 rating-star" data-bs-toggle="tooltip"
                  data-bs-placement="top" title="<?= $i + 1 ?> Stars" 
                  value="<?= $product['id'] ?>-<?= $i + 1 ?>-<?=$_SESSION['userdata']['id']?>"></input>
              <?php } ?>
            </div>
            <div class="w-100 d-flex flex-row align-items-baseline mt-3">
              <h6 class="text-secondary">Avg. Rating: </h6>
              <p class="ms-2"><?php echo $product['avg_rating'] ?> | <?php echo $product['rating_count'] ?> ratings</p>
            </div>
          </div>
          <div class="card-text p-3">
            <h6 class="text-secondary">Price: &#36; <?php echo ($product['price']) ?></h6>
            <div class="d-flex flex-row justify-content-between">
              <h6 class="text-secondary">Unit: <?php echo ($product['unit']) ?></h6>
            </div>
            <form action="/cart" method="POST" class="product-form">
              <div class="input-group my-3">
                <span class="input-group-text">Quantity:</span>
                <input type="number" name="quantity" id="<?= $product['id'] ?>_qty" value="1"
                class="form-control form-control-sm">
              </div>
              <input type="hidden" name="prodId" value="<?= $product['id'] ?>">
              <input type="hidden" name="userId" value="<?= $_SESSION['userdata']['id'] ?>">
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