<?php
require_once 'database.php';

class Dbh extends Database
{
    public static function signupUser($id, $name, $phone, $email, $password)
    {
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        $stmt = self::connect()->prepare('INSERT INTO `personnels`(`id`, `name`, `phone`, `email`, `password_hash`) VALUES (?, ?, ?, ?, ?)');
        $stmt->execute([$id, $name, $phone, $email, $password_hash]);
    }

    public static function verifyUser($email, $password)
    {
        $stmt = self::connect()->prepare('SELECT * FROM `personnels` WHERE `email` = ?');
        $stmt->execute([$email]);
        $row = $stmt->fetch();

        if ($row && password_verify($password, $row['password_hash'])) {
            return true;
        } else {
            return false;
        }
    }

    public static function getUserName($email)
    {
        $stmt = self::connect()->prepare('SELECT * FROM `personnels` WHERE `email` = ?');
        $stmt->execute([$email]);
        $row = $stmt->fetch();
        if ($row) {
            return $row['name'];
        } else {
            return null;
        }
    }

    public static function selectAllFromTable($table)
    {
        $stmt = self::connect()->query("SELECT * FROM `$table`");
        $retrieved_data = array();
        if ($stmt) {
            while($row = $stmt->fetch()) {
                $retrieved_data[] = $row;
            }
        }
        return $retrieved_data;
    }
}
