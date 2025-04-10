<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parceiros Pets - Cadastro</title>
    <link rel="stylesheet" href="../css/cadastro.css"> 
    <link rel="stylesheet" href="../css/navbar.css"> 
    <script src="../js/formulario.js"></script>
    <link rel="shortcut icon" href="../Imagem/Logo.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
</head>
<body>

    <header>
        <div id="navbar"></div>
    </header>

    <div class="bg"></div>
   
    <section id="cadastro">
        <div class="cadastro-container">

            <h2>Faça seu Cadastro</h2>
            <form id="cadastro-form" action="../php/processa_cadastro.php" method="POST">
    
            <div id="mensagem-erro" class="mensagem-erro" style="display:none;"></div>
   
            <div class="form-group">
                
                    <input type="text" id="nome" name="nome_usuario" placeholder="Nome" required>
                </div>
                <div class="form-group">
                    <input type="text" id="cpf" name="cpf_usuario" placeholder="CPF" required>
                </div>
                <div class="form-group">
                    <input type="email" id="email" name="email_usuario" placeholder="E-mail" required>
                </div>
                <div class="form-group">
                    <input type="password" id="senha" name="senha_usuario" placeholder="Senha" required>
                </div>
                
                <div class="social-login">
                    <div class="linha-container">
                        <div class="linha">
                            <div class="espaco"></div>
                        </div>
                    </div>
                    <div class="social-icons">
                        <a href="#" id="Google" class="social-icon">
                           <img src="../Imagem/Google.svg" alt="Google">
                        </a>
                        <a href="#" id="phone" class="social-icon">
                            <img src="../Imagem/icons8-facebook-novo-50.png" alt="Facebook">
                        </a>
                    </div>
                </div>
                <button type="submit" class="cadastrar-button">Cadastrar</button>
            </form>
            <div class="logar">
                <span>Já Tem conta?</span> <a href="../pages/login.php">Entrar</a>
            </div>
        </div>
    </section>
    
    <script src="../js/script.js"></script>
</body>
</html>