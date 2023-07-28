<?php

namespace App\Core;

class Database 
{
    private static $host = 'localhost';
    private static $dbname = 'car_location';
    private static $username =  'root';
    private static $password = '';
    private static $connection;

    public static function connect()
    {
        // On vérifie si $connection a deja été crééen, si c'est pas le cas on la créé
        // Design pattern Singleton permet d'éviter d'appeler une ressource inutilement
        if (!isset(self::$connection)) { 
            try {
                // On met un backslash devant PDO pour lui dire qu'il est à la racine du projet et non pas dans un sous-dossier
                self::$connection = new \PDO(
                    'mysql:host='. self::$host . ';dbname=' . self::$dbname . ';charset=utf8', self::$username, 
                    self::$password, 
                    [\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION], 
                );
            } catch (Exception $e) {
                die('Erreur de connexion à la base de donnée :' . $e->getMessage());
            } 
        }
    }
    public static function getConnection()
    {
        return self::$connection;
    }
}