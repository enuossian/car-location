<?php

namespace App\Controller\Admin;

use App\Controller\AbstractController;
use App\Model\Car;
use App\Core\Session;

class AdminCarController  extends AbstractController
{
    public function index(): void
    {
        $car = new Car();
        $cars = $car->getCars();
        require_once '../templates/admin/cars.php';
    }
    public function carForm($params)
    {
        $car = new Car();
        $carDetails = $car->getCarById( $params['id']);
        //var_dump($carDetails);
        require_once '../templates/admin/car-form.php';
    }
    public function updateCar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') { //Verifie si formulaire envoyé 
            $model = trim($_POST['name']);
            $description = trim($_POST['description']);
            $price = trim($_POST['price']);
            $id = $_POST['id'];

            if (isset($_FILES['img']) && $_FILES['img']['error'] === 0) {
                $allowed = ['jpg' => 'image/jpg', 'jpeg' => 'image/jpeg', 'gif' => 'image/gif'];
                $fileName = $_FILES['img']['name'];
                $fileType = $_FILES['img']['type'];
                $fileSize = $_FILES['img']['size'];

                $extension = pathinfo($fileName, PATHINFO_EXTENSION); 
                if (!array_key_exists($extension, $allowed)){
                    Session::setFlashMessage('Le format de votre fichier n\'est pas correct', 'warning');
                    header ('Location: /car-location/backoffice/update-car/' .$id);
                    exit();
                }
                $maxSize = 8 * 1024 * 1024;
                if ($fileSize > $maxSize) {
                    Session::setFlashMessage('fichier est trop volumineux', 'warning');
                    header ('Location: /car-location/backoffice/update-car/' .$id);
                    exit();
                }
                if (in_array($fileType, $allowed)) {
                    if(file_exists('./img/upload/' . $fileName)){
                        Session::setFlashMessage('le fichier a déjà été téléchargé', 'warning');
                    } else {
                        move_uploaded_file($_FILES['img']['tmp_name'], './img/upload/' . $_FILES['img']['name']);
                        Session::setFlashMessage('', 'success');
                        header ('Location: /car-location/backoffice/cars/' .$id);
                        exit();


                    }
                }


            } else {
                Session::setFlashMessage('Une erreur dans le fichier image s\'est produite, veuillez recommencer', 'warning');
                header ('Location: /car-location/backoffice/update-car/' .$id);
                exit();
            }


            if (empty($model)) {
                Session::setFlashMessage('le champs modèle est vide !', 'warning');
                header ('Location: /car-location/backoffice/update-car/' .$id);
                exit();
            }

            $car = new Car();
            $car->updateCar($id, $model, $description, $price, $fileName);
            Session::setFlashMessage('Une voiture vient d\'être modifiée', 'success');
            header ('Location: /car-location/backoffice/cars');
            exit();


        } else {
            header ('Location: /car-location/backoffice/cars');
            exit();
        }
    }
    public function deconnexion() {
        session_destroy();
        unset($_SESSION);
        Session::setFlashMessage('Vous êtes déconnecté', 'warning');
        header ('Location: /car-location/backoffice/cars');
        exit();
    }
}


