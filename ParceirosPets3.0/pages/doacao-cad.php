<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parceiros Pets - Doacao</title>
    <link rel="stylesheet" href="../css/doacao-cad.css"> 
    <link rel="shortcut icon" href="../Imagem/Logo.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Bevan&family=Questrial&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/accessibility.css">
    <script src="../js/acessibilidade.js"></script>
</head> 
<body>  
    <button id="accessibility-btn" aria-label="Ativar modo de acessibilidade">
        <span>Acessibilidade</span>
    </button>
    <div id="navbar"></div>
    <div class="bg"></div>
    <div class="dog"></div>
    <div class="cat"></div>

    <section id="doacao">
        <div id="texto-doacao">
            <h2>Seja um Doador</h2>
            <p>Seu apoio é essencial para garantir alimentação, cuidados veterinários e um lar temporário seguro para os animais resgatados. Com sua doação, podemos oferecer mais amor e dignidade a cães e gatos que esperam por uma nova chance.</p> 
        </div>


           
        <div class="doacao-container" id="doacao-container">

            <h1 id="titulo">Informações do Doador</h1>

            <?php if (isset($_GET['erro'])): ?> <!-- Mensagem de erro -->
            <div class="mensagem-erro">
                <?php
                    switch ($_GET['erro']) {
                        case 'cpf_invalido':
                            echo 'CPF inválido. Verifique e tente novamente.';
                            break;
                        case 'duplicado':
                            echo 'CPF ou e-mail já cadastrado para uma doação.';
                            break;
                    }
                ?>
            </div>
        <?php endif; ?>

            <form id="doacao-form" method="POST" action="../php/processa_doacao.php">
                <input type="text" id="nome" name="nome" placeholder="Nome Completo" required>
                <input type="text" id="cpf" name="cpf" placeholder="CPF" required>
                <input type="tel" id="telefone" name="telefone" placeholder="Telefone" required>
                <input type="email" id="email" name="email" placeholder="Email" required>
                
                <h1>Forma de Pagamento:</h1>
                <div id="pagamento" class="pagamento-options">
                    <div class="pagamento-option" data-value="credito">
                        <img src="../Imagem/credito.png" alt="Crédito">
                        <p>Crédito</p>
                    </div>
                    <div class="pagamento-option" data-value="debito">
                        <img src="../Imagem/debito.png" alt="Débito">
                        <p>Débito</p>
                    </div>
                    <div class="pagamento-option" data-value="pix">
                        <img src="../Imagem/pix.png" alt="Pix">
                        <p>Pix</p>
                    </div>
                </div>

                <input type="hidden" name="tipo_doacao" id="tipo_doacao"> <!-- pega a escolha do pagamento -->

                <button type="submit" id="confirmar-pagamento" class="doacao-button">Confirmar</button>
            </form>
        </div>
    </section>

    <script src="../js/script.js"></script>
    <script src="../js/doacao.js"></script>
</body>
</html>