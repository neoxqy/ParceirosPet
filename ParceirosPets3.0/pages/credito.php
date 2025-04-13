<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parceiros Pets - Pagamento</title>
    <link rel="stylesheet" href="../css/Credito.css"> 
    <link rel="shortcut icon" href="../Imagem/Logo.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Bevan&family=Questrial&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/accessibility.css">
    <script src="../js/acessibilidade.js"></script>
</head>
<body>

    <header>
        <button id="accessibility-btn" aria-label="Ativar modo de acessibilidade">
            <span>Acessibilidade</span>
        </button>
        <div id="navbar"></div>
    </header>

    <section id="pagamento">
        <div class="container">
            <div id="cpf" class="cpf-section">
                <h3>Confirme seu CPF/CNPJ</h3>
                <input type="text" placeholder="Digite apenas números" required>
                <p>Campo obrigatório (somente números)</p>
            </div>

            <form action="../php/processa_credito.php" method="POST" id="pagar" class="payment-form">
                <div id="credito" class="credit-section">
                    <h2>Dados do Cartão</h2>
                    <div class="form-row">
                        <div class="form-group">
                            
                            <label for="numerocartao">Número do Cartão</label>
                            <input type="text" id="numerocartao" name="numerocartao" placeholder="Digite apenas números" required>
                        </div>
                        <div class="form-group">
                            <label for="datavalidade">Data de Validade</label>
                            <input type="date" id="datavalidade" name="datavalidade" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="nometitular">Nome do Titular</label>
                            <input type="text" id="nometitular" name="nometitular" placeholder="Como escrito no cartão" required>
                        </div>
                        <div class="form-group">
                            <label for="cvv">CVV</label>
                            <input type="text" id="cvv" name="cvv" placeholder="3 dígitos" maxlength="3" required>
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

                     <!-- vai ser preenchido com js -->
                    <input type="hidden" name="cpf" id="cpf_hidden">

                    <button type="submit" class="copia">FINALIZAR PAGAMENTO</button>
                </div>
            </form>
        </div>
    </section>

    <script>
        document.getElementById("pagar").addEventListener("submit", function(event) {
            // Copia o valor do CPF externo para o input hidden
            var cpfExterno = document.getElementById("cpf_externo").value;
            document.getElementById("cpf_hidden").value = cpfExterno;
        });
    </script>

    <script src="../js/script.js"></script>
</body>
</html>