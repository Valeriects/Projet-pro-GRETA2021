<?php

class Database
{

    // methode static :
    private static $_dbHost = "mysql:host=localhost:;dbname=";
    private static $_dbUser = "";
    private static $_dbPassword = "";


    //methode static : on peut appeler directement sans instancier:
    public static function getPDO()
    {
        // methode static avec propriétés static aussi :
        $database = new PDO(self::$_dbHost, self::$_dbUser, self::$_dbPassword);

        // pr récupérer les erreurs :
        $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $database;
    }
}
