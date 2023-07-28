<?php
require_once '../templates/includes/front/header.php';
?>
            
<section class="container py-3">
  <h1>Nos voitures</h1>
  <div class= "row flex-wrap justify-content-center">
    <?php
    foreach ($cars as $car) {
    ?>
    <div class="card m-2" style="width: 18rem;">
      <img src="/car-location/public/img/clio.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h2 card-title><?= $car['name']; ?></h2>
        <p class="card-text"><?= $car['description']; ?></p>
        <p><?= $car['price']; ?></p>
        <a href="/car-location/reservation/<?= $car['id']; ?>" class="btn btn-outline-success">reserver</a>
      </div>
    </div>
<?php
          }
          ?>
      </div>
      </section>

<?php

require_once '../templates/includes/footer.php';

?>

