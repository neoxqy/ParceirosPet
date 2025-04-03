<?php
class Connection {
    private static $host = 'localhost'; 
    private static $dbname = 'parceirospet';
    private static $user = 'root'; 
    private static $pass = ''; 
    private static $conn = null;

    // Método para conexão
    public static function getConnection() {
        if (self::$conn === null) {
            try {
                self::$conn = new PDO("mysql:host=" . self::$host . ";dbname=" . self::$dbname . ";charset=utf8", self::$user, self::$pass);
                self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Erro na conexão: " . $e->getMessage());
            }
        }
        return self::$conn;
    }
}
