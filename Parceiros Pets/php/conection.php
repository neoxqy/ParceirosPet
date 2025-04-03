<?php
class Conexao {
    private static $host = "localhost";
    private static $usuario = "root";
    private static $senha = "";
    private static $banco = "";

    public static function conectar() {
        try {
            $conn = new PDO(
                "mysql:host=" . self::$host . ";dbname=" . self::$banco,
                self::$usuario,
                self::$senha
            );
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (PDOException $e) {
            die("Erro: " . $e->getMessage());
        }
    }
}
?>