<?php
session_start();
require_once 'Connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = trim($_POST['nome']);
    $cpf = trim($_POST['cpf']);
    $email = trim($_POST['email']);
    $senha = $_POST['senha'];

    // Regex para validação
    $regex_nome = "/^[A-Za-zÀ-ÖØ-öø-ÿ]+(?: [A-Za-zÀ-ÖØ-öø-ÿ]+)*$/"; // Nome letras e espaços
    $regex_cpf = "/^[0-9]{11}$/"; // CPF 11 digitos sem pontos
    $regex_email = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/"; // E-mail com @
    $regex_senha = "/^(?=.*[A-Za-z])(?=.*\d).{6,}$/"; // Senha mínimo 6 caracteres 1 letra 1 número)

    // Validações
    if (!preg_match($regex_nome, $nome)) {
        $_SESSION['mensagem'] = "Nome inválido! Use apenas letras e espaços.";
        $_SESSION['mensagem_tipo'] = "erro";
        header("Location: ../pages/cadastro.php");
        exit();
    }

    if (!preg_match($regex_cpf, $cpf)) {
        $_SESSION['mensagem'] = "CPF inválido! Digite apenas números.";
        $_SESSION['mensagem_tipo'] = "erro";
        header("Location: ../pages/cadastro.php");
        exit();
    }

    if (!preg_match($regex_email, $email)) {
        $_SESSION['mensagem'] = "E-mail inválido! Verifique o formato.";
        $_SESSION['mensagem_tipo'] = "erro";
        header("Location: ../pages/cadastro.php");
        exit();
    }

    if (!preg_match($regex_senha, $senha)) {
        $_SESSION['mensagem'] = "A senha deve ter pelo menos 6 caracteres, incluindo letras e números.";
        $_SESSION['mensagem_tipo'] = "erro";
        header("Location: ../pages/cadastro.php");
        exit();
    }

    // Hash na senha
    $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

    try {

        $conn = Connection::getConnection();
        $sql = "INSERT INTO usuarios (nome_usuario, cpf_usuario, email_usuario, senha_usuario) VALUES (:nome, :cpf, :email, :senha)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':cpf', $cpf);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $senha_hash);
        $stmt->execute();

        // Mensagem de sucesso e redirecionamento
        $_SESSION['mensagem'] = "Cadastro realizado com sucesso!";
        $_SESSION['mensagem_tipo'] = "sucesso";
        header("Location: ../pages/login.php");
        exit();

    } catch (PDOException $e) {

        $_SESSION['mensagem'] = "Erro ao cadastrar. Tente novamente mais tarde.";
        $_SESSION['mensagem_tipo'] = "erro";
        header("Location: ../pages/cadastro.php");
        exit();
    }
}
?>
