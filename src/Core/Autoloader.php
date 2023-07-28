<?php

namespace App\Core;

class Autoloader
{
    public static function register()
    {
        // Cette fonciton est appelée lorsque le serveur ne trouve pas la classe
        spl_autoload_register(function($class) {
        // Elle prend une fonction en paramètre 
        $classPath = str_replace('App', 'src', $class);
        // str_replace() prend 3 paramètres
        $classPath = str_replace('\\', DIRECTORY_SEPARATOR, $classPath);
        require_once '..' . DIRECTORY_SEPARATOR . $classPath . '.php';
        });
    }
}
