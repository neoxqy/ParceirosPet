<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parceiros Pets - Adotar</title>
    <link rel="stylesheet" href="../css/confirm-adocao.css">
</head>

<body>
    <div class="container">
        <h1>Confirmação de Adoção</h1>

        <form class="confirm-form">
            <h2>Confirma a sua adoção?</h2>
            
            <div class="button-group">
                <button type="button" class="btn-sim" onclick="confirmarAdocao()">Sim</button>
                <button type="button" class="btn-nao" onclick="cancelarAdocao()">Não</button>
            </div>
        </form>
    </div>

    <script>
        function confirmarAdocao() {
            alert("Adoção confirmada! Obrigado por adotar um pet.");
            window.location.href = "home.php"; 
        }

        function cancelarAdocao() {
            alert("Adoção cancelada.");
            window.location.href = "home.php"; 
        }
    </script>
</body>
</html>
