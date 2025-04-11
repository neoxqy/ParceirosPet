<?php
require_once("conexao.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cpf = $_POST["cpf"];

    // Validação do CPF
    if (!preg_match('/^\d{11}$/', $cpf)) {
        $_SESSION['mensagem_erro'] = "CPF inválido. Digite apenas 11 números sem pontos ou traços.";
        header("Location: ../pages/debito.php");
        exit;
    }

    try {
        $conn = Conexao::conectar();

        // Verifica duplicidade
        $verifica = $conn->prepare("SELECT COUNT(*) FROM debito WHERE cpf_debito = ?");
        $verifica->execute([$cpf]);

        if ($verifica->fetchColumn() > 0) {
            $_SESSION['mensagem_erro'] = "Esse CPF já realizou uma doação via débito.";
            header("Location: ../pages/debito.php");
            exit;
        }
        else {
            $_SESSION['mensagem_sucesso'] = "Obrigado pela sua doação via débito! O boleto foi gerado com sucesso 🐾";
            header("Location: ../pages/home.html");
            exit;
        }

        // Inserção
        $sql = "INSERT INTO debito (cpf_debito, boleto) VALUES (?, NOW())";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$cpf]);

        // Redireciona para página de sucesso
        header("Location: ../pages/home.html");
        exit;

    } catch (PDOException $e) {
        $_SESSION['mensagem_erro'] = "Erro ao processar o pagamento: " . $e->getMessage();
        header("Location: ../pages/debito.php");
        exit;
    }
}
?>
