<?php
require_once 'conexao.php';
session_start();

$conn = Conexao::conectar();
$stmt = $conn->prepare("SELECT * FROM usuario WHERE id_usuario = ?");
$stmt->execute([$_SESSION['usuario']]);
$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = $_POST['nome'] ?? '';
    $email = $_POST['email'] ?? '';
    $telefone = $_POST['telefone'] ?? '';
    $senha_hash = hash('sha256', $_POST['senha'] ?? '');
    $novasenha_hash = hash('sha256', $_POST['novasenha'] ?? '');

    if($nome != null){
        if (!preg_match("/^[A-Za-zÀ-ú\s]{3,}$/", $nome)) {
            header("Location: ../pages/cadastro.php?erro=Nome inválido");
            exit();
        }
    
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            header("Location: ../pages/cadastro.php?erro=E-mail inválido");
            exit();
        }
    
        // Verifica se o e-mail já está cadastrado
        $sql_verifica = "SELECT * FROM usuario WHERE email_usuario = ?";
        $stmt_verifica = $conn->prepare($sql_verifica);
        $stmt_verifica->execute([$email]);

        if ($stmt_verifica->rowCount() > 0) {
            // E-mail já existe
            header("Location: ../pages/cadastro.php?erro=E-mail já cadastrado");
            exit();
        }

        $stmt = $conn->prepare("UPDATE usuario SET nome_usuario = ?, email_usuario = ?, telefone_usuario = ? WHERE id_usuario = ?");
        $stmt->execute([$nome, $email, $telefone, $_SESSION['usuario']]);
        header("Location: ../pages/config.html");
    }
    else if($senha_hash == $usuario['senha_usuario']){
        if (strlen($novasenha_hash) < 6) {
            header("Location: ../pages/cadastro.php?erro=Senha deve ter no mínimo 6 caracteres");
            exit();
        }

        $stmt = $conn->prepare("UPDATE usuario SET senha_usuario = ? WHERE id_usuario = ?");
        $stmt->execute([$novasenha_hash, $_SESSION['usuario']]);
        header("Location: ../pages/config.html");
    }

}