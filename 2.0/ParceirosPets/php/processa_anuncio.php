<?php
require_once "conexao.php";

$conn = Conexao::conectar();

// Verifica se os campos existem
if (
    isset($_POST['nome_animal'])  && 
    isset($_POST['especie_animal'])   && 
    isset($_POST['idade_animal']) && 
    isset($_POST['descricao_animal']) && 
    isset($_POST['porte_animal']) && 
    isset($_POST['peso_animal'])
) {
    $nome = trim($_POST['nome_animal']);
    $especie = trim($_POST['especie_animal']);
    $idade = trim($_POST['idade_animal']);
    $peso = trim($_POST['peso_animal']);
    $porte = trim($_POST['porte_animal']);
    $descricao = trim($_POST['descricao_animal']);
    $castrado = trim($_POST['castrado'] == '1');

    $stmt = $conn->prepare(
        "INSERT INTO animal (nome_animal, especie, idade, peso, porte, descricao_animal, castrado) 
        VALUES (?,?,?,?,?,?,?)");
    
    if ($stmt->execute([$nome, $especie, $idade, $peso, $porte, $descricao, $castrado])) {
        echo "
        <!DOCTYPE html>
        <html lang='pt-BR'>
        <head>
            <meta charset='UTF-8'>
            <title>Animal cadastrado</title>
            <link rel='stylesheet' href='../css/Credito.css'>
            <style>
                body {
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    height: 100vh;
                    background-color: #f9f9f9;
                    font-family: 'Open Sans', sans-serif;
                    text-align: center;
                }
                .mensagem {
                    background-color: #ffffff;
                    padding: 30px;
                    border-radius: 10px;
                    box-shadow: 0 4px 10px rgba(0,0,0,0.1);
                }
                .mensagem h1 {
                    color: #4CAF50;
                    font-size: 2em;
                }
                .mensagem p {
                    font-size: 1.1em;
                    margin-top: 10px;
                }
                .mensagem a {
                    display: inline-block;
                    margin-top: 20px;
                    padding: 10px 20px;
                    background-color: #4CAF50;
                    color: white;
                    text-decoration: none;
                    border-radius: 5px;
                    transition: background 0.3s ease;
                }
                .mensagem a:hover {
                    background-color: #45a049;
                }
            </style>
        </head>
        <body>
            <div class='mensagem'>
                <h1>Animal cadastrado!</h1>
                <p>Anúncio de animal criado com sucesso.</p>
                <a href='../pages/CriarAnuncio.html'>Voltar para a tela de cadastro de animais</a>
                <a href='../pages/adm.html'>Voltar para a tela de ADM</a>
            </div>
        </body>
        </html>
        "; 
        exit();
    } else {
        header("Location: ../pages/cadastro.php?erro=Erro ao cadastrar");
        exit();
    }

}