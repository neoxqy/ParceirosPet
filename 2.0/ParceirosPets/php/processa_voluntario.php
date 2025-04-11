<?php
require_once 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = $_POST['nome'] ?? '';
    $telefone = $_POST['telefone'] ?? '';
    $rua = $_POST['rua'] ?? '';
    $cidade = $_POST['cidade'] ?? '';
    $cep = $_POST['cep'] ?? '';
    $uf = $_POST['uf'] ?? '';
    $ong = $_POST['ong'] ?? '';

    // Sanitizar os dados
    $nome = filter_var($nome, FILTER_SANITIZE_STRING);
    $telefone = filter_var($telefone, FILTER_SANITIZE_STRING);
    $rua = filter_var($rua, FILTER_SANITIZE_STRING);
    $cidade = filter_var($cidade, FILTER_SANITIZE_STRING);
    $cep = filter_var($cep, FILTER_SANITIZE_STRING);
    $uf = filter_var($uf, FILTER_SANITIZE_STRING);
    $ong = filter_var($ong, FILTER_SANITIZE_STRING);

    try {
        $conn = Conexao::conectar();

        $sql = "INSERT INTO voluntario (nome_voluntario, telefone_voluntario, rua_voluntario, cidade_voluntario, cep_voluntario, uf_voluntario, ong_voluntario) 
                VALUES (:nome, :telefone, :rua, :cidade, :cep, :uf, :ong)";
        
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':telefone', $telefone);
        $stmt->bindParam(':rua', $rua);
        $stmt->bindParam(':cidade', $cidade);
        $stmt->bindParam(':cep', $cep);
        $stmt->bindParam(':uf', $uf);
        $stmt->bindParam(':ong', $ong);
        $stmt->execute();

        header("Location: ../pages/voluntario-conc.html");
        exit();
    } catch (PDOException $e) {
        echo "Erro ao cadastrar voluntário: " . $e->getMessage();
    }
}
?>
