<?php

namespace App\Controller;


abstract class AbstractController
{
    protected \PDO $pdo;

    public function __construct()
    {
    }
}