<?php
require_once "conexao.php";

try {
    $conn = Conexao::conectar();

    $sql = "INSERT INTO adocao (data_adocao, contar_adocao) VALUES (NOW(), 1)";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    // Redireciona para a home após a confirmação
    header("Location: ../pages/home.html");
    exit;
    
} catch (PDOException $e) {
    echo "Erro ao confirmar adoção: " . $e->getMessage();
}
?>
