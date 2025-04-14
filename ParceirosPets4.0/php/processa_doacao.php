<?php
require_once("conexao.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $cpf = $_POST["cpf"];
    $telefone = $_POST["telefone"];
    $email = $_POST["email"];
    $tipo_doacao = $_POST["tipo_doacao"];

    try {
        $conn = Conexao::conectar();

        // === Validação de CPF (sem função) ===
        $cpf = preg_replace('/[^0-9]/', '', $cpf); // remove pontos e traços
        if (strlen($cpf) != 11 || preg_match('/(\d)\1{10}/', $cpf)) {
            header("Location: ../pages/doacao-cad.php?erro=cpf_invalido");
            exit;
        }

        // === Verifica duplicação CPF ou e-mail ===
        $verificaSql = "SELECT COUNT(*) FROM doacao WHERE cpf_doacao = ? OR email_doacao = ?";
        $verificaStmt = $conn->prepare($verificaSql);
        $verificaStmt->execute([$cpf, $email]);
        $existe = $verificaStmt->fetchColumn();

        if ($existe > 0) {
            header("Location: ../pages/doacao-cad.php?erro=duplicado");
            exit;
        }

        // === Insere doação ===
        $sql = "INSERT INTO doacao (
            nome_doacao, cpf_doacao, telefone_doacao, email_doacao, tipo_doacao, data_doacao, contar_doacao
        )
        VALUES (?, ?, ?, ?, ?, NOW(), ?)";

        $stmt = $conn->prepare($sql);
        $contar = 1;
        $stmt->execute([$nome, $cpf, $telefone, $email, $tipo_doacao, $contar]);

        // === Redirecionamento ===
        switch ($tipo_doacao) {
        case 'credito':
        header("Location: ../pages/credito.php");
        break;

        case 'debito':
        header("Location: ../pages/debito.php");
        break;

        case 'pix':
        header("Location: ../pages/pix.php");
        break;
        
        default:
        header("Location: ../home.html"); // fallback
        break;
        }

        exit;

    } catch (PDOException $e) {
        echo "Erro ao inserir no banco: " . $e->getMessage();
    }
}
?>
