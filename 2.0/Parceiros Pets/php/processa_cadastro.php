<?php
require_once "conexao.php";

// Verifica se os campos existem
if (
    isset($_POST['nome_usuario']) && 
    isset($_POST['cpf_usuario']) && 
    isset($_POST['email_usuario']) && 
    isset($_POST['senha_usuario'])
) {
    $nome = trim($_POST['nome_usuario']);
    $cpf = trim($_POST['cpf_usuario']);
    $email = trim($_POST['email_usuario']);
    $senha = trim($_POST['senha_usuario']);

    // Regex
    if (!preg_match("/^[A-Za-zÀ-ú\s]{3,}$/", $nome)) {
        header("Location: ../pages/cadastro.php?erro=Nome inválido");
        exit();
    }

    if (!preg_match("/^\d{11}$/", $cpf)) {
        header("Location: ../pages/cadastro.php?erro=CPF inválido");
        exit();
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../pages/cadastro.php?erro=E-mail inválido");
        exit();
    }

    if (strlen($senha) < 6) {
        header("Location: ../pages/cadastro.php?erro=Senha deve ter no mínimo 6 caracteres");
        exit();
    }

    // senha com SHA-256
    $senhaHash = hash('sha256', $senha);

    // Verifica se o e-mail já está cadastrado
    $sql_verifica = "SELECT * FROM usuario WHERE email_usuario = ?";
    $stmt_verifica = $conn->prepare($sql_verifica);
    $stmt_verifica->bind_param("s", $email);
    $stmt_verifica->execute();
    $resultado = $stmt_verifica->get_result();

    if ($resultado->num_rows > 0) {

        // E-mail já existe
        header("Location: ../pages/cadastro.php?erro=E-mail já cadastrado");
        exit();
    }


    // Inseri no banco de dados
    $sql = "INSERT INTO usuario (nome_usuario, cpf_usuario, email_usuario, senha_usuario, data_criacao) 
            VALUES (?, ?, ?, ?, NOW())";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $nome, $cpf, $email, $senhaHash);

    if ($stmt->execute()) {
        header("Location: ../pages/sucesso.php");
        exit();
    } else {
        header("Location: ../pages/cadastro.php?erro=Erro ao cadastrar");
        exit();
    }

} else {
    header("Location: ../pages/cadastro.php?erro=Preencha todos os campos");
    exit();
}
?>
