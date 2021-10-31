<?php
/** @var int $oldBalance */
/** @var int $newBalance */
/** @var int $purchaseCost */
/** @var string $balanceWarning */
?>

<div class="container">
  <div class="card p-3">
    <h3 class="text-center">Thanks for your purchase!</h3>
    <div class="w-100 border-bottom border-secondary"></div>
    <div class="card-body mt-3">
      <div class="card-text">
        <div class="d-flex flex-row mb-3">
          <h5>Previous Balance: </h5>
          <h5 class="ms-3">&#36; <?php echo number_format(($oldBalance / 100), 2); ?></h5>
        </div>
        <div class="d-flex flex-row mb-3">
          <h5>New Balance: </h5>
          <h5 class="ms-3">&#36; <?php echo number_format(($newBalance / 100), 2); ?></h5>
        </div>
        <div class="d-flex flex-row mb-3">
          <h5>Total Purchase: </h5>
          <h5 class="ms-3">&#36; <?php echo number_format(($purchaseCost / 100), 2); ?></h5>
        </div>
      </div>
    </div>
  </div>
  <?php if ($balanceWarning) { ?>
    <div class="w-100 text-center mt-3">
      <p class="text-danger"><?php echo $balanceWarning ?></p>
    </div>
  <?php } ?>
  <div class="w-100 text-center mt-3">
    <a href="/">Go Home</a>
  </div>
</div>