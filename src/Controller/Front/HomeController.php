<?php

namespace App\Controller\Front;

use App\Model\Car;
use App\Controller\AbstractController;

class HomeController extends AbstractController
{
    public function index() 
    {
        $car = new Car();
        $cars = $car->getCars();
        require_once '../templates/Front/home.php';
    }
}