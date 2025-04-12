<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Segurança</title>
    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="../css/seguranca.css">
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
                <i class="fas fa-lock icon"></i>
                <h2>Segurança</h2>
            </div>
            <p>Configure a segurança da sua conta.</p>
            <form id="segurancaForm" method="POST" action="../php/processa_mudanca.php">
                <div class="input-group">
                    <label for="senha-atual">Senha Atual:</label>
                    <div class="input-wrapper">
                        <i class="fas fa-lock input-icon"></i>
                        <input type="password" name="senha" id="senha-atual" required>
                    </div>
                </div>
                <div class="input-group">
                    <label for="nova-senha">Nova Senha:</label>
                    <div class="input-wrapper">
                        <i class="fas fa-key input-icon"></i>
                        <input type="password" name="novasenha" id="nova-senha" required>
                    </div>
                </div>
                <div class="input-group">
                    <label for="confirmar-senha">Confirmar Nova Senha:</label>
                    <div class="input-wrapper">
                        <i class="fas fa-key input-icon"></i>
                        <input type="password" name="novasenha" id="confirmar-senha" required>
                    </div>
                </div>
                <button type="submit" id="submitBtn">
                    <span class="btn-text">Alterar Senha</span>
                    <i class="fas fa-check-circle btn-icon"></i>
                </button>
            </form>
            <div class="feedback-message" id="feedbackMessage"></div>
        </div>
    </div>
    <script>
        /*document.getElementById('segurancaForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const btn = document.getElementById('submitBtn');
            const feedback = document.getElementById('feedbackMessage');
            btn.classList.add('loading');
            feedback.textContent = '';
            setTimeout(() => {
                btn.classList.remove('loading');
                btn.classList.add('success');
                feedback.textContent = 'Senha alterada com sucesso!';
                feedback.classList.add('show');
            }, 2000);
        });*/
    </script>
</body>
</html>