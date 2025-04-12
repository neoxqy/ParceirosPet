<?php
session_start();
require_once "../php/conexao.php";

if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}

$pdo = Conexao::conectar();
$stmt = $pdo->prepare("SELECT * FROM usuario WHERE id_usuario = ?");
$stmt->execute([$_SESSION['usuario']]);
$usuario = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dados Pessoais</title>
    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="../css/dados-pessoais.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../css/accessibility.css">
    <script src="../js/acessibilidade.js"></script>
</head>
<body>
    <header>
        <button id="accessibility-btn" aria-label="Ativar modo de acessibilidade">
            <span>Acessibilidade</span>
        </button>
        <div id="navbar"></div>
        <script src="../js/script.js"></script>
    </header>
    <div class="container">
        <div class="section">
            <div class="header-section">
                <i class="fas fa-user-circle icon"></i>
                <h2>Dados Pessoais</h2>
            </div>
            <p>Veja ou edite suas informações pessoais.</p>
            <form id="dadosForm" method="POST" action="../php/processa_mudanca.php">
                <div class="input-group">
                    <label for="nome">Nome Completo:</label>
                    <div class="input-wrapper">
                        <i class="fas fa-user input-icon"></i>
                        <input type="text" name="nome" id="nome" value="<?=htmlspecialchars($usuario['nome_usuario'])?>" required>
                    </div>
                </div>
                <div class="input-group">
                    <label for="email">E-mail:</label>
                    <div class="input-wrapper">
                        <i class="fas fa-envelope input-icon"></i>
                        <input type="email" name="email" id="email" value="<?=htmlspecialchars($usuario['email_usuario'])?>" required>
                    </div>
                </div>
                <div class="input-group">
                    <label for="telefone">Telefone:</label>
                    <div class="input-wrapper">
                        <i class="fas fa-phone input-icon"></i>
                        <input type="tel" name="telefone" id="telefone" value="<?=htmlspecialchars($usuario['telefone_usuario'])?>" required>
                    </div>
                </div>
                <button type="submit" id="submitBtn">
                    Salvar Alterações
                </button>
            </form>
            <div class="feedback-message" id="feedbackMessage"></div>
        </div>
    </div>
    <script>
        /*document.getElementById('dadosForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const btn = document.getElementById('submitBtn');
            const feedback = document.getElementById('feedbackMessage');
            btn.classList.add('loading');
            feedback.textContent = '';
            setTimeout(() => {
                btn.classList.remove('loading');
                btn.classList.add('success');
                feedback.textContent = 'Alterações salvas com sucesso!';
                feedback.classList.add('show');
            }, 2000);
        });*/
    </script>
</body>
</html>