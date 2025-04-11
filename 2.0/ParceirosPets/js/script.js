// Função para carregar componentes dinamicamente
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

        // Após carregar o navbar, inicializar os eventos do dropdown
        inicializarDropdown();
    } catch (error) {
        console.error(`Erro ao carregar ${arquivo}:`, error);
    }
}

// Função para inicializar os eventos do dropdown
function inicializarDropdown() {
    const menuToggle = document.getElementById('menuToggle');
    const dropdownMenu = document.getElementById('dropdownMenu');
    const logoutLink = document.getElementById('logout');

    if (menuToggle && dropdownMenu && logoutLink) {
        // Abrir/fechar o dropdown ao clicar no botão de menu
        menuToggle.addEventListener('click', () => {
            dropdownMenu.classList.toggle('active');
        });

        // Fechar o dropdown ao clicar fora
        document.addEventListener('click', (e) => {
            if (!menuToggle.contains(e.target) && !dropdownMenu.contains(e.target)) {
                dropdownMenu.classList.remove('active');
            }
        });

        // Lógica de logout (simulação)
        logoutLink.addEventListener('click', (e) => {
            e.preventDefault();
            alert('Você saiu da conta! (Simulação)');
            // Exemplo: window.location.href = '/pages/login.html';
        });
    }
}

// Carregar o navbar ao carregar a página
document.addEventListener("DOMContentLoaded", function() {
    if (document.getElementById("navbar")) {
        carregarComponente("navbar", "../components/navbar.html");
    }

});