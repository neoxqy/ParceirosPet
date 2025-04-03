<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parceiros Pets - Cadastro</title>
    <link rel="stylesheet" href="../css/pagamento.css"> 
    <link rel="shortcut icon" href="../Imagem/Logo.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">  <!-- Importar a fonte Anton do Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Questrial&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bevan&display=swap" rel="stylesheet">

</head>
<body>
    <!-- Navbar -->
    <header>
        <div id="navbar"></div>
    </header>

    <section id="pagamento">
        <div id="cpf">
            <h3>Confirme seu CPF/CNPJ</h3>
            <input type="text" placeholder="Digite aqui seu CPF/CNPJ" required>
            <p>Campo obrigatório (somente números)</p>
        </div>

        <form action="" id="pagar">
        <div id="credito">
            <div class="form-row">
                <div class="form-group">
                    <label for="numerocartao">Número do Cartão</label>
                    <input type="text" id="numerocartao" name="numerocartao" placeholder="Digite apenas os números sem espaço" required>
                </div>

                <div class="form-group">
                    <label for="datavalidade">Data de Validade</label>
                    <input type="date" id="datavalidade" name="datavalidade" required>
                </div>
            </div>
            
            <div class="form-row">
                <div class="form-group">
                    <label for="nometitular">Nome do Titular do cartão</label>
                    <input type="text" id="nometitular" name="nometitular" placeholder="Como escrito no cartão" required>
                </div>

                <div class="form-group">
                    <label for="cvv">CVV</label>
                    <input type="text" id="cvv" name="cvv" placeholder="3 dígitos" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="parcelamento">Parcelamento</label>
                    <input list="vezes" id="parcelamento" name="parcelamento" required>
                    <datalist id="vezes">
                        <option value="À vista">
                        <option value="2x">
                        <option value="3x">
                    </datalist>
                </div>
            </div>

            <button type="submit" class="copia">FINALIZAR PAGAMENTO</button>
        </div>
        </form>
    </section>

    <footer>
        <p>&copy; 2025 Parceiros Pets. Todos os direitos reservados.</p>
    </footer>

    <script src="../js/script.js"></script>