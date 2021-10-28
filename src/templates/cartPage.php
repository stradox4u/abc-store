<?php
/** @var array $cart */
/** @var array $user */
/** @var int $total */
/** @var int $balance */
?>

<div class="container">
  <div class="d-flex flex-row my-3">
    <h5>User Balance:</h5>
    <h5 class="text-secondary ms-3">&#36; <?php 
      echo number_format(($balance / 100), 2) ?></h5>
  </div>
  <ul class="list-group list-group-flush">
    <?php foreach($cart as $cartItem)
    { ?>
      <li class="list-group-item">
        <div class="mb-3 p-3">
          <div class="d-flex flex-row justify-content-between">
            <img src="<?= $cartItem['image'] ?>" alt="<?= $cartItem['name'] ?> -image"
              class="img-fluid col" style="object-fit: cover; max-width: 180px;">
            
            <div class="col d-flex flex-column ms-5">
              <div class="d-flex flex-row justify-content-between">
                <h4 class="text-capitalize text-start"><?php echo $cartItem['name'] ?></h4>
                <div class="d-flex flex-row align-items-baseline">
                  <h6 class="text-secondary">subtotal: </h6>
                  <h5 class="text-dark ms-2">&#36; <?php echo number_format(($cartItem['price'] 
                    * $cartItem['quantity']), 2); ?></h3>
                </div>
              </div>
              <div class="w-100 border-bottom border-secondary"></div>
              <div class="d-flex flex-row justify-content-between mt-2">
                <h6 class="text-secondary">Price: &#36; <?php echo $cartItem['price'] ?></h6>
                <h6 class="text-secondary">Unit: <?php echo $cartItem['unit']; ?></h6>
              </div>
              <form action="/cart" method="PATCH" class="cart-product-form">
                <div class="input-group my-3">
                  <span class="input-group-text">Quantity:</span>
                  <input type="number" name="quantity" id="<?= $cartItem['id'] ?>_qty" 
                    value="<?= $cartItem['quantity'] ?>"
                  class="form-control form-control-sm">
                </div>
                <input type="hidden" name="prodId" value="<?= $cartItem['id'] ?>">
                <input type="hidden" name="userId" value="<?= $_SESSION['userdata']['id'] ?>">
                <div class="d-grid gap-2">
                  <button class="btn btn-primary btn-sm mt-3">Update Quantity</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </li>
    <?php } ?>
  </ul>
  <div class="w-100 d-flex flex-row mt-5">
      <h3>Total: </h3>
      <h3 class="ms-3">&#36; <?php echo number_format($total, 2); ?></h3>
  </div>
  <div class="d-grid gap-2">
    <button class="btn btn-primary btn-lg my-3">Pay Now</button>
  </div>
</div>