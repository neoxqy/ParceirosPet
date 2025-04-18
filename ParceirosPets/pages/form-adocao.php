<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parceiros Pets - Adotar</title>
    <link rel="stylesheet" href="../css/form-adocao.css">
</head>

<body>
    <div class="container">
        <!-- Seção Esquerda - Títulos -->
        <div class="left-section">
            <h1>Formulário de Adoção</h1>
            <h2>Informe todos os dados pedidos, para concluir a solicitação de adoção do seu parceiro pet</h2>
        </div>
        
        <!-- Imagem do Cachorro -->
        <div class="center-section">
            <img class="dog-image" src="../Imagem/salsichadog.png" alt="Cachorro para adoção">
        </div>
        

        <!-- Seção Direita - Formulário com Imagem -->
        <div class="right-section">

            <!-- Formulário -->
            <form class="adoption-form">
                <h3>Dados para Adoção</h3>
                
                <div class="input-group">
                    <input type="text" id="endereco" name="endereco" required placeholder="Endereço completo">
                </div>
                
                <div class="input-group">
                    <input type="text" id="cep" name="cep" required placeholder="CEP">
                </div>

                <button class="botao-adotar" onclick="window.location.href='confirm-adocao.php'">
                    Concluir
                </button>
            </form>
        </div>
    </div>

    <script src="../js/script.js"></script>
</body>
</html>