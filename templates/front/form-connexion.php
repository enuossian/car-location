<?php
require_once '../templates/includes/front/header.php';
?>
<section class="container py-3 mt-2" >  
    <h1>Connectez-vous !</h1>
<form action="/car-location/connect" method="post">
  <div class="mb-3">
    <label for="email" class="form-label">email</label>
    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email">
  </div>
  <div class="mb-3">
    <label for="pswd" class="form-label">mot de passe</label>
    <input type="password" class="form-control" id="pswd" name="pswd">
  </div>
  <button type="submit" class="btn btn-primary">Envoyer</button>
</form>
</section>

<?php
require_once '../templates/includes/footer.php';
?>