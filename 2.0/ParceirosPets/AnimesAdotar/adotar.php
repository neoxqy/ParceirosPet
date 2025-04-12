<?php
require_once "../php/conexao.php";

class Animal {
    public static function getAnimalById($id) {
        $pdo = Conexao::conectar();
        $stmt = $pdo->prepare("SELECT * FROM animal WHERE id_animal = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}

$id_animal = isset($_GET['id']) ? intval($_GET['id']) : 1;

$animal = Animal::getAnimalById($id_animal);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parceiros Pets - Adotar</title>
    <link rel="stylesheet" href="../css/adotar.css">
    <link rel="stylesheet" href="../css/navbar.css">
    <link rel="stylesheet" href="../css/accessibility.css">
    <script src="../js/acessibilidade.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&family=Bevan&display=swap" rel="stylesheet">
</head>

<header>
    <button id="accessibility-btn" aria-label="Ativar modo de acessibilidade">
        <span>Acessibilidade</span>
    </button>
    <div id="navbar"></div>
</header>
<body>
    <div class="bg"></div>

    <main class="adotar-container">
        <div class="foto-principal">
            <img src="../NossosParceiros/<?=htmlspecialchars($animal['nome_animal'])?>.png" alt="<?= htmlspecialchars($animal['especie'])?> <?= htmlspecialchars($animal['nome_animal']) ?> para adoção">
        </div>

        <div class="fotos-secundarias">
            <div class="foto-secundaria">
                <img src="../img adotar/<?=htmlspecialchars($animal['nome_animal'])?>1.jpg" alt="Foto 1 do gato <?= htmlspecialchars($animal['nome_animal']) ?>">
            </div>
            <div class="foto-secundaria">
                <img src="../img adotar/<?=htmlspecialchars($animal['nome_animal'])?>2.jpg" alt="Foto 2 do gato <?= htmlspecialchars($animal['nome_animal']) ?>">
            </div>
        </div>

        <div class="info-animal">
            <h1><?=htmlspecialchars($animal['nome_animal'])?></h1>
            <div class="descricao">
                <p><?=htmlspecialchars($animal['descricao_animal'])?></p>
            </div>
            <div class="dados-animal">
                <div class="dado-redondo">
                    <span class="icone"><?=htmlspecialchars($animal['especie']) == 'gato' ? '🐱' : '🐶' ?></span>
                    <span>Porte <?=htmlspecialchars($animal['porte']) ?></span>
                </div>
                <div class="dado-redondo">
                    <span class="icone"><?=$animal['castrado'] ? '✔️' : '❌' ?></span>
                    <span><?=$animal['castrado'] ? 'Castrado' : 'Não castrado' ?></span>
                </div>
                <div class="dado-redondo">
                    <span class="icone">⚖️</span>
                    <span><?=htmlspecialchars($animal['peso'])?>kg</span>
                </div>
                <div class="dado-redondo">
                    <span class="icone">🎂</span>
                    <span><?=htmlspecialchars($animal['idade'])?> anos</span>
                </div>
            </div>
            <button class="botao-adotar" onclick="window.location.href='../pages/confirm-adocao.html'">
                Quero Adotar!
            </button>
        </div>
    </main>

    <script src="../js/script.js"></script>
</body>
</html>