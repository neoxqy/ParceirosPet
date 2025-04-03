<?php
session_start();
require_once 'Connection.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $senha = trim($_POST['senha']);

    // Regex para validação
    $regex_email = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/"; // E-mail com o @
    $regex_senha = "/^(?=.*[A-Za-z])(?=.*\d).{6,}$/"; // Senha mínimo 6 caracteres 1 letra  1 número)

    // Validações
    if (empty($email) || empty($senha)) {
        $_SESSION['erro_login'] = "Preencha todos os campos!";
        header("Location: ../pages/login.php");
        exit();
    }

    if (!preg_match($regex_email, $email)) {
        $_SESSION['erro_login'] = "E-mail invalido! Verifique o formato.";
        header("Location: ../pages/login.php");
        exit();
    }

    if (!preg_match($regex_senha, $senha)) {
        $_SESSION['erro_login'] = "A senha deve ter pelo menos 6 caracteres, incluindo letras e números.";
        header("Location: ../pages/login.php");
        exit();
    }

    try {
        $conn = Connection::getConnection();
        $stmt = $conn->prepare("SELECT id_usuario, nome_usuario, senha_usuario FROM usuarios WHERE email_usuario = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($senha, $user['senha_usuario'])) {
            $_SESSION['usuario_id'] = $user['id_usuario'];
            $_SESSION['usuario_nome'] = $user['nome_usuario'];
            header("Location: ../pages/home.php"); // Redireciona para a página principal
            exit();
        } else {
            $_SESSION['erro_login'] = "E-mail ou senha inválidos!";
            header("Location: ../pages/login.php");
            exit();
        }
    } catch (PDOException $e) {
        $_SESSION['erro_login'] = "Erro ao acessar o banco de dados.";
        header("Location: ../pages/login.php");
        exit();
    }
}
?>
