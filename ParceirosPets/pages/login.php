<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parceiros Pets - Login</title>
    <link rel="stylesheet" href="../css/login.css"> <!-- Link para o CSS do login -->
    <link rel="shortcut icon" href="../Imagem/Logo.png" type="image/x-icon">
    <!-- Importar a fonte Anton do Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
</head>
<body>
    <!-- Navbar -->
    <header>
     <div id="navbar"></div>
    </header>

    <!-- Seção de Login -->
    <section id="login">
        <div class="login-container">

        <!-- mensagem de erro no login -->
        <?php session_start(); ?>

        <?php if (isset($_SESSION['erro_login'])): ?>
            <p style="color: red; text-align: center;"><?php echo $_SESSION['erro_login']; unset($_SESSION['erro_login']); ?></p>
        <?php endif; ?>


            <h2>Faça seu Login</h2>
            <form id="login-form" action="../php/processa_login.php" method="POST">
                <div class="form-group">
                    
                    <input type="email" id="email" name="email" placeholder="E-mail" required>
                </div>

                <div class="form-group">
                    
                    <input type="password" id="senha" name="senha" placeholder="Senha" required>
                </div>

                <div class="social-login">
                    <div class="linha-container">
                        <div class="linha">
                            <div class="espaco"></div>
                        </div>
                    </div>

                    <div class="social-login">
                        <div class="social-divider">
                            <div class="divider-line"></div>
                            <span class="divider-text">OU</span>
                            <div class="divider-line"></div>
                        </div>
                        <div class="social-icons">
                            <div class="social-icon-wrapper">
                                <a href="#" class="social-icon">
                                    <img src="../Imagem/Google.svg" alt="Login com Google">
                                </a>
                            </div>
                            <div class="social-icon-wrapper">
                                <a href="#" class="social-icon">
                                    <img src="../Imagem/icons8-facebook-novo-50.png" alt="Login com Facebook">
                                </a>
                            </div>
                        </div>
                    </div>

                <button type="submit" class="entrar-button">Entrar</button>
            </form>
            <div class="cadastrar">
                <span> Não tem conta?</span> <a href="/ParceirosPets/pages/cadastro.php"> Cadastre-se</a>
        </div>
    </section>

    
     <script src="../js/script.js"></script>
</body>
</html>