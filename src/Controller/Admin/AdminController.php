<?php

namespace App\Controller\Admin;

use App\Controller\AbstractController;

class AdminController extends AbstractController
{
    public function index(): void
    {
        require_once '../templates/admin/admin.php';
    }
}