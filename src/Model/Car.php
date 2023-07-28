<?php

namespace App\Model;

use App\Model\AbstractModel;


class Car extends AbstractModel
{
    public function getCars(): array
    {
        $stmt = $this->pdo->prepare('SELECT * FROM car');
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getCarById(int $id): array
    {
        $stmt = $this->pdo->prepare('SELECT * FROM car WHERE id = :id;');
        $stmt->execute([
            ':id' => $id
        ]);
        return $stmt->fetch();
    }
    public function updateCar(int $id, string $name, string $description, float $price, string $image): void // fonction qui ne retourne rien
    {
        $stmt = $this->pdo->prepare('UPDATE car SET name = :name, description = :description, price = :price, image= :image WHERE id= :id');
        $stmt->execute([
            ':name' => $name,
            ':description' => $description, 
            ':price' => $price, 
            ':id' => $id        
        ]);
        
    }


    
}