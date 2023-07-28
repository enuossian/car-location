<?php
require_once '../templates/includes/admin/header.php';
?>

<section class="container py-3">
    <h1 class="mb-4">Modifier un véhicule</h1>
    <form action="/car-location/backoffice/form-car" method="post" enctype="multipart/form-data" class="w-75 m-auto">
    <input type="text" value="<?= $carDetails['id']; ?>" name="id" hidden>
    <div class="mb-3">
        <label for="name" class="form-label">Modèle</label>
        <input type="text" class="form-control" id="name" name="name" value="<?= $carDetails['name']; ?>" >
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control" id="description" name="description"><?= $carDetails['description']?></textarea>
    </div>
    <div class="mb-3">
        <label for="price" class="form-label">Prix</label>
        <input type="text" class="form-control" id="price" name="price" value="<?= $carDetails['price']; ?>">
    </div>
    <div class="mb-3">
        <label for="img" class="form-label">Image</label>
        <input type="file" class="form-control" id="img" name="img" >
    </div>
  <button type="submit" value="envoyer" class="btn btn-outline-success">Modifier</button>
</form>
</section>


<?php
require_once '../templates/includes/footer.php';


