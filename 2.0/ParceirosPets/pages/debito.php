<?php
session_start();
$mensagemErro = $_SESSION['mensagem_erro'] ?? '';
$mensagemSucesso = $_SESSION['mensagem_sucesso'] ?? '';
unset($_SESSION['mensagem_erro'], $_SESSION['mensagem_sucesso']);
?>
?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parceiros Pets - Pagamento via Boleto</title>
    <link rel="stylesheet" href="../css/Debito.css"> 
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
            <div id="cpf" class="cpf-section">
                <h3>Confirme seu CPF/CNPJ</h3>
                <input type="text" placeholder="Digite apenas números" required>
                <p>Campo obrigatório (somente números)</p>
            </div>

            <!--mensagens de erro e acerto do formulario com cpf-->
            <?php if (!empty($mensagemErro)): ?> 
            <div class="mensagem-erro">
                <p><?= htmlspecialchars($mensagemErro) ?></p>
            </div>
        <?php endif; ?>

        <?php if (!empty($mensagemSucesso)): ?>
            <div class="mensagem-sucesso">
                <p><?= htmlspecialchars($mensagemSucesso) ?></p>
            </div>
            <script>
                setTimeout(function () {
                    window.location.href = '../pages/home.html';
                }, 3000); // redireciona após 3 segundos
            </script>
        <?php endif; ?>


           <!-- Formulário com campo hidden para o CPF -->
           <form action="../php/processa_debito.php" method="POST" id="form-debito">
                <input type="hidden" name="cpf" id="cpf-hidden">

                <div id="boleto" class="boleto-section">
                    <h2>Pagamento via Boleto</h2>
                    <img src="../Imagem/boleto.png" alt="Código de barras do boleto" id="debito" class="boleto-img">
                    <button type="submit" class="copia">COPIAR NÚMERO</button>
                </div>
            </form>

        </div>
    </section>

   <script src="../js/script.js"></script>

   <script>
    const cpfInput = document.querySelector('#cpf input');
    const cpfHidden = document.getElementById('cpf-hidden');

    // Quando a página carregar ou o CPF for digitado:
    cpfInput.addEventListener('input', function () {
        cpfHidden.value = cpfInput.value.trim();
    });
</script>


 
</body>
</html>