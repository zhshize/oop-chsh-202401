<?php

class ConnectionManager {
    private static string $host = 'localhost';
    private static string $dbName = 'oop_cat_store';
    private static string $username = 'oop_cat_store';
    private static string $password = 'oop_cat_store';

    private static ?PDO $connection = null;

    public static function db(): PDO {
        if (is_null(ConnectionManager::$connection)) {
            try {
                // http://php.net/manual/en/pdo.connections.php
                $db = new PDO("mysql:host=" . self::$host . ";dbname=" . self::$dbName, self::$username, self::$password);

                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch(PDOException $e) {
                echo $e->getMessage();
            }
            self::$connection = $db;
        }

        return self::$connection;
    }
}
