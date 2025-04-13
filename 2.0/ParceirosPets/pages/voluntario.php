<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parceiros Pets - Voluntário</title>
    <link rel="stylesheet" href="../css/voluntario.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Bevan&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
   
    <div class="formulario-container">
        <div class="titulo-section">
            <h1>Formulário de Voluntário</h1>
            <p>Informe todos os dados pedidos para se tornar um voluntário da ONG Parceiros Pets.</p>
        </div>

        <div class="imagem-direita">
            <img src="../Imagem/cats.jpg" alt="Voluntariado com animais">
        </div>

        <div class="form-section"> <!-- Quase que nao encontro essa porra de formulario -->
            <h2>Preencha seus Dados</h2>
            <form id="voluntarioForm" action="../php/processa_voluntario.php" method="POST">
                <div class="form-group">
                    <label for="nome">Nome Completo</label>
                    <div class="input-wrapper">
                        <i class="fas fa-user input-icon"></i>
                        <input type="text" id="nome" name="nome" placeholder="Digite seu nome completo" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="telefone">Telefone</label>
                    <div class="input-wrapper">
                        <i class="fas fa-phone input-icon"></i>
                        <input type="tel" id="telefone" name="telefone" placeholder="(XX) XXXXX-XXXX" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="rua">Nome da Rua</label>
                    <div class="input-wrapper">
                        <i class="fas fa-road input-icon"></i>
                        <input type="text" id="rua" name="rua" placeholder="Digite o nome da rua" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="cidade">Cidade</label>
                    <div class="input-wrapper">
                        <i class="fas fa-city input-icon"></i>
                        <input type="text" id="cidade" name="cidade" placeholder="Digite sua cidade" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="cep">CEP</label>
                    <div class="input-wrapper">
                        <i class="fas fa-map-pin input-icon"></i>
                        <input type="text" id="cep" name="cep" placeholder="XXXXX-XXX" pattern="\d{5}-?\d{3}" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="uf">UF</label>
                    <div class="input-wrapper">
                        <i class="fas fa-map-marker-alt input-icon"></i>
                        <select id="uf" name="uf" required>
                            <option value="">Selecione</option>
                            <option value="AC">Acre (AC)</option>
                            <option value="AL">Alagoas (AL)</option>
                            <option value="AP">Amapá (AP)</option>
                            <option value="AM">Amazonas (AM)</option>
                            <option value="BA">Bahia (BA)</option>
                            <option value="CE">Ceará (CE)</option>
                            <option value="DF">Distrito Federal (DF)</option>
                            <option value="ES">Espírito Santo (ES)</option>
                            <option value="GO">Goiás (GO)</option>
                            <option value="MA">Maranhão (MA)</option>
                            <option value="MT">Mato Grosso (MT)</option>
                            <option value="MS">Mato Grosso do Sul (MS)</option>
                            <option value="MG">Minas Gerais (MG)</option>
                            <option value="PA">Pará (PA)</option>
                            <option value="PB">Paraíba (PB)</option>
                            <option value="PR">Paraná (PR)</option>
                            <option value="PE">Pernambuco (PE)</option>
                            <option value="PI">Piauí (PI)</option>
                            <option value="RJ">Rio de Janeiro (RJ)</option>
                            <option value="RN">Rio Grande do Norte (RN)</option>
                            <option value="RS">Rio Grande do Sul (RS)</option>
                            <option value="RO">Rondônia (RO)</option>
                            <option value="RR">Roraima (RR)</option>
                            <option value="SC">Santa Catarina (SC)</option>
                            <option value="SP">São Paulo (SP)</option>
                            <option value="SE">Sergipe (SE)</option>
                            <option value="TO">Tocantins (TO)</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="ong">Selecionar ONG</label>
                    <div class="input-wrapper">
                        <i class="fas fa-paw input-icon"></i>
                        <select id="ong" name="ong" required> 
                            <option value="">Selecione</option>
                            <option value="ONG Parceiros Pets">ONG Parceiros Pets</option>
                        </select>
                    </div>

                </div>
                <button type="submit" class="botao-continuar">
                    <span class="btn-text">Continuar</span>
                    <i class="fas fa-arrow-right btn-icon"></i>
                </button>

            </form>
            <div class="feedback-message" id="feedbackMessage"></div>
        </div>
    </div>
    
    <script src="../js/script.js" defer></script>

    
</body>
</html>