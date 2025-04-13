document.addEventListener('DOMContentLoaded', function () {
  const accessibilityBtn = document.getElementById('accessibility-btn');
  const body = document.body;

  // Verifica se o modo já está ativo no localStorage
  if (localStorage.getItem('accessibility') === 'active') {
      body.classList.add('accessibility-active');
      accessibilityBtn.textContent = 'Desativar Acessibilidade';
  }

  // Evento de clique no botão
  accessibilityBtn.addEventListener('click', function () {
      body.classList.toggle('accessibility-active');

      // Atualiza o texto do botão e salva o estado
      if (body.classList.contains('accessibility-active')) {
          accessibilityBtn.textContent = 'Desativar Acessibilidade';
          localStorage.setItem('accessibility', 'active');
      } else {
          accessibilityBtn.textContent = 'Ativar Acessibilidade';
          localStorage.setItem('accessibility', 'inactive');
      }
  });
});