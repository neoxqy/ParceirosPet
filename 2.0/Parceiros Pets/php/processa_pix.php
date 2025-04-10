<?php
session_start();
require_once("conexao.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cpf = $_POST["cpf"];
    $qrcode = $_POST["qrcode"];
    

    // Validação do CPF 11num
    if (!preg_match('/^\d{11}$/', $cpf)) {
        $_SESSION['mensagem_erro'] = "CPF/CNPJ inválido. Digite apenas 11 ou 14 números.";
        header("Location: ../pages/pix.php");
        exit;
    }

    try {
        $conn = Conexao::conectar();

        // Verifica se o CPF/CNPJ já foi usado
        $verifica = $conn->prepare("SELECT COUNT(*) FROM pix WHERE cpf_pix = ?");
        $verifica->execute([$cpf]);

        if ($verifica->fetchColumn() > 0) {
            $_SESSION['mensagem_erro'] = "Esse CPF/CNPJ já realizou uma doação via Pix.";
            header("Location: ../pages/pix.php");
            exit;
        }

        // Inserção no banco
        $sql = "INSERT INTO pix (cpf_pix, qrcode) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$cpf, $qrcode]);

        $_SESSION['mensagem_sucesso'] = "Obrigado pela sua doação via Pix! 🐾";
        header("Location: ../pages/pix.php");
        exit;

    } catch (PDOException $e) {
        $_SESSION['mensagem_erro'] = "Erro ao processar o pagamento: " . $e->getMessage();
        header("Location: ../pages/pix.php");
        exit;
    }
}
?>
