<?php
class Database
{
    private static $dbservername = "localhost";
    private static $dbusername = "root";
    private static $dbpassword = "root";
    private static $dbname = "orderanddeliverymanagement";

    protected static function connect()
    {
        try {
            $dsn = 'mysql:host=' . self::$dbservername . ';dbname=' . self::$dbname;
            $pdo = new PDO($dsn, self::$dbusername, self::$dbpassword);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            return $pdo;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            die();
        }
    }
}


