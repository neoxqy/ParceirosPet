<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parceiros Pets - Adotar</title>
    <link rel="stylesheet" href="../css/adotar.css">
   
</head>
<header>
    <div id="navbar"></div>
</header>
<body>

    <div class="bg">


    <main class="adotar-container">
        <!-- Foto principal à esquerda -->
        <div class="foto-principal">
            <img src="../Imagem/dobermanpincher-shokoladnyi-15-1.webp" alt="Cão para adoção">
        </div>

        <!-- Fotos secundárias -->
        <div class="fotos-secundarias">
            <div class="foto-secundaria">
                <img src="../Imagem/doberman.jpg" alt="Foto 1 do cão">
            </div>
            <div class="foto-secundaria">
                <img src="../Imagem/dobermandog.jpeg" alt="Foto 2 do cão">
            </div>
            <div class="foto-secundaria">
                <img src="../Imagem/dobermanpincher-shokoladnyi-15-1.webp" alt="Foto 3 do cão">
            </div>
        </div>

        <!-- Informações do animal -->
        <div class="info-animal">
            <h1>Rex</h1>
            
            <div class="descricao">
                <p>Rex é um Dobberman de 3 anos, muito brincalhão e carinhoso. Adora passeios e se dá bem com crianças e outros animais.</p>
            </div>
            
            <div class="dados-animal">
                <div class="dado-redondo">
                    <span class="icone">🐕</span>
                    <span>Porte Médio</span>
                </div>
                <div class="dado-redondo">
                    <span class="icone">✔️</span>
                    <span>Castrado</span>
                </div>
                <div class="dado-redondo">
                    <span class="icone">⚖️</span>
                    <span>18kg</span>
                </div>
            </div>
            
            <button class="botao-adotar" onclick="window.location.href='form-adocao.php'">
                Quero Adotar!
            </button>
        </div>
    </main>

   
    <script src="../js/script.js"></script>
</body>
</html>