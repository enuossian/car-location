<?php
require_once '../templates/includes/admin/header.php';
?>
<section class="container py-3">
    <table class="table table-striped caption-top">
        <!-- la boucle foreach du tableau $cars -->
        <caption>Liste de nos véhicules</caption>
        <thead>
            <tr>
                <th>Id </th>
                <th>Modèle</th>
                <th>Description</th>
                <th>Prix</th>
                <th>Nom du fichier</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Id </th>
                <th>Modèle</th>
                <th>Description</th>
                <th>Prix</th>
                <th>Nom du fichier</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>
        </tfoot>
        <tbody>
        <?php
        foreach ($cars as $car) {
        ?>
            <tr>
                <td><?= $car['id']; ?></td>
                <td><?= $car['name']; ?></td>
                <td><?= $car['description']; ?></td>
                <td><?= $car['price']; ?> euros</td>
                <td><?= $car['image']; ?></td>
                <td class="text-center">
                    <a href="/car-location/backoffice/update-car/<?= $car['id']; ?>"><i class="bi bi-pencil-square"></i></a>
                </td>
                <td class="text-center">
                    <a href=""><i class="bi bi-trash text-danger"></i></a>
                </td>
            </tr>
        <?php
        }
        ?>
        </tbody>
    </table>
</section>
<?php
require_once '../templates/includes/footer.php';