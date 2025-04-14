<?php
session_start();
$mensagemErro = $_SESSION['mensagem_erro'] ?? '';
$mensagemSucesso = $_SESSION['mensagem_sucesso'] ?? '';
unset($_SESSION['mensagem_erro'], $_SESSION['mensagem_sucesso']);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parceiros Pets - Pagamento via Pix</title>
    <link rel="stylesheet" href="../css/Pix.css"> 
    <link rel="shortcut icon" href="../Imagem/Logo.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Bevan&family=Questrial&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/accessibility.css">
    <script src="../js/acessibilidade.js"></script>
</head>
<body>
    <header>
        <button id="accessibility-btn" aria-label="Ativar modo de acessibilidade">
            <span>Acessibilidade</span>
        </button>
        <div id="navbar"></div>
    </header>
    <section id="pagamento">
        <div class="container">

            <!-- MENSAGEM DE ERRO OU SUCESSO -->
            <?php if (!empty($mensagemErro)): ?>
                <div class="mensagem-erro"><?= htmlspecialchars($mensagemErro) ?></div>
            <?php endif; ?>

            <?php if (!empty($mensagemSucesso)): ?>
                <div class="mensagem-sucesso"><?= htmlspecialchars($mensagemSucesso) ?></div>
                <script>
                    setTimeout(() => {
                        window.location.href = '../pages/home.html';
                    }, 3000);
                </script>
            <?php endif; ?>

            <form action="../php/processa_pix.php" method="POST">
            <div id="cpf" class="cpf-section">
                <h3>Confirme seu CPF/CNPJ</h3>
                <input type="text" name="cpf" placeholder="Digite apenas números" required>
                <p>Campo obrigatório (somente números)</p>
            </div>

            <div id="qr" class="pix-section">
                <h2>Pagamento via Pix</h2>
                <p>Escaneie o QR Code ou use o Pix Copia e Cola:</p>
                <img src="../Imagem/qrcode.png" alt="QR Code para Pix" class="qr-img">
                <a href="#"><button class="copia">PIX COPIA E COLA</button></a>
            </div>
            </form>

        </div>
    </section>

    <script src="../js/script.js"></script>
</body>
</html>