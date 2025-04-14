<?php
require_once 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST['email'] ?? '';
    $senha = $_POST['senha'] ?? '';

    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $senha_hash = hash('sha256', $senha);

    $conn = Conexao::conectar();

    // Verifica se é admin
    $stmtAdmin = $conn->prepare("SELECT * FROM administracao WHERE email_admin = ? AND senha_admin = ?");
    $stmtAdmin->execute([$email, $senha_hash]);

    if ($stmtAdmin->rowCount() === 1) {
        session_start();
        $_SESSION['admin'] = $email;
        header("Location: ../pages/adm.html"); // redireciona para a página HTML do admin
        exit();
    }

    // Verifica se é usuário comum
    $stmtUser = $conn->prepare("SELECT * FROM usuario WHERE email_usuario = ? AND senha_usuario = ?");
    $stmtUser->execute([$email, $senha_hash]);
    $usuario = $stmtUser->fetch(PDO::FETCH_ASSOC);

    if ($stmtUser->rowCount() === 1) {
        session_start();
        $_SESSION['usuario'] = $usuario['id_usuario'];
        header("Location: ../pages/dados-pessoais.php");
        exit();
    } else {
        header("Location: ../pages/login.php?erro=Email+ou+senha+inválidos");
        exit();
    }
}
?>
