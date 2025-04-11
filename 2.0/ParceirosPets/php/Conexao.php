<?php
class Conexao {
    private static $host = "localhost";
    private static $dbname = "parceirospets";
    private static $usuario = "root";
    private static $senha = "root";

    public static function conectar() {
        try {
            $pdo = new PDO("mysql:host=".self::$host.";dbname=".self::$dbname, self::$usuario, self::$senha);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            die("Erro na conexão: " . $e->getMessage());
        }
    }
}
?>
