// obtendo parâmetros da URL
function getParametroUrl(nome) {
    const params = new URLSearchParams(window.location.search);
    return params.get(nome);
  }
  
  // Mostra a mensagem de erro se existir
  document.addEventListener("DOMContentLoaded", function () {
    const erro = getParametroUrl("erro");
    const mensagemErro = document.getElementById("mensagem-erro");
  
    if (erro) {
      mensagemErro.style.display = "block";
      mensagemErro.textContent = decodeURIComponent(erro);
  
      // marca os inputs de vermelho:
      const inputs = document.querySelectorAll("form input");
      inputs.forEach(input => {
        input.classList.add("input-erro");
      });
    }
  });
  