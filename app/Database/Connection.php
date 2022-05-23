<?php

namespace Seior\PHP\Uas\Database;

use PDO;

class Connection
{
    private static PDO $connection;

    public static function getConnection(): PDO
    {
        $host = "localhost";
        $port = 3306;
        $user = "root";
        $pass = "";
        $db = "uas";

//        $host = strval($_ENV['DATABASE_URL']);
//        $port = strval($_ENV['DATABASE_PORT']);
//        $user = strval($_ENV['DATABASE_USER']);
//        $pass = strval($_ENV['DATABASE_PASSWORD']);
//        $db = strval($_ENV['DATABASE_NAME']);

        Connection::$connection = new PDO("mysql:host=$host:$port;dbname=$db", $user, $pass);

        return Connection::$connection;
    }
}