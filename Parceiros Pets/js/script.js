async function carregarComponente(id, arquivo) {
  try {
      const elemento = document.getElementById(id);
      if (!elemento) {
          console.error(`Elemento com ID "${id}" não encontrado.`);
          return;
      }

      console.log(`Tentando carregar: ${arquivo}`);

      const response = await fetch(arquivo);
      if (!response.ok) {
          throw new Error(`Erro ao carregar ${arquivo}: ${response.status} ${response.statusText}`);
      }
      const data = await response.text();
      elemento.innerHTML = data;

  } catch (error) {
      console.error(`Erro ao carregar ${arquivo}:`, error);
  }
}

document.addEventListener("DOMContentLoaded", function() {
  if (document.getElementById("navbar")) {
      carregarComponente("navbar", "../components/navbar.html");
  }
});
