<?php
require_once("conexao.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numero_cartao = $_POST["numerocartao"];
    $nome_titular = $_POST["nometitular"];
    $parcelamento = $_POST["parcelamento"];
    $cvv = $_POST["cvv"];
    $cpf = $_POST["cpf"];
    $data_validade = $_POST["datavalidade"];

    try {
        $conn = Conexao::conectar();

        $sql = "INSERT INTO credito (numero_cartao, nome_titular, parcelamento, ccv, cpf_credito, validade)
                VALUES (?, ?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);
        $stmt->execute([$numero_cartao, $nome_titular, $parcelamento, $cvv, $cpf, $data_validade]);

        // Mensagem HTML de agradecimento
        echo "
        <!DOCTYPE html>
        <html lang='pt-BR'>
        <head>
            <meta charset='UTF-8'>
            <title>Obrigado pela Doação</title>
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
                <h1>Obrigado pela sua doação!</h1>
                <p>Seu apoio é muito importante para nós e para os nossos animaizinhos 💚</p>
                <a href='../pages/home.html'>Voltar para a página inicial</a>
            </div>
        </body>
        </html>
        ";
        exit;

    } catch (PDOException $e) {
        echo "Erro ao inserir no banco: " . $e->getMessage();
    }
}
?>
