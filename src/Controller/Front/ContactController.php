<?php

namespace \App\Controller\Front;

use App\Controller\AbstractController;
use App\Model\Car;

class ContactController extends AbstractController;
{
    public function index($params) 
    {
        echo $params;
    }
    public function saveForm()
    {}
}