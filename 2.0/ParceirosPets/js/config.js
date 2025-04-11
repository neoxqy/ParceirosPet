const userData = {
  "personal-data": {
      name: "Seu Nome Completo",
      email: "seuemail@exemplo.com"
  },
  "account-data": {
      username: "seunomeusuario",
      created: "01/01/2023"
  },
  "security": {
      password: "********"
  },
  "credit-cards": {
      card: "**** **** **** 1234"
  },
  "addresses": {
      address: "Rua Exemplo, 123, Cidade, Estado"
  }
};

const settingsItems = document.querySelectorAll('.settings-item');
const modal = document.getElementById('edit-modal');
const modalTitle = document.getElementById('modal-title');
const editForm = document.getElementById('edit-form');
const closeModal = document.querySelector('.close-modal');

function openModal(section) {
  const data = userData[section];
  modalTitle.textContent = document.querySelector(`[data-section="${section}"] h4`).textContent;
  editForm.innerHTML = ''; 

  
  for (let key in data) {
      const label = document.createElement('label');
      label.textContent = key.charAt(0).toUpperCase() + key.slice(1);
      const input = document.createElement(key === 'address' ? 'textarea' : 'input');
      input.value = data[key];
      input.name = key;
      editForm.appendChild(label);
      editForm.appendChild(input);
  }

  const saveButton = document.createElement('button');
  saveButton.textContent = 'Salvar';
  saveButton.type = 'submit';
  editForm.appendChild(saveButton);

  modal.style.display = 'flex';
}

settingsItems.forEach(item => {
  item.addEventListener('click', () => {
      const section = item.getAttribute('data-section');
      openModal(section);
  });
});

closeModal.addEventListener('click', () => {
  modal.style.display = 'none';
});

modal.addEventListener('click', (e) => {
  if (e.target === modal) {
      modal.style.display = 'none';
  }
});

editForm.addEventListener('submit', (e) => {
  e.preventDefault();
  const section = document.querySelector(`[data-section="${document.querySelector('.settings-item:hover, .settings-item:focus')?.getAttribute('data-section') || ''}"]`)?.getAttribute('data-section');
  if (section) {
      const formData = new FormData(editForm);
      for (let [key, value] of formData) {
          userData[section][key] = value;
      }
      alert('Dados salvos com sucesso! (Simulação)');
      modal.style.display = 'none';

      if (section === 'personal-data') {
          document.querySelector('.user-details h3').textContent = userData['personal-data'].name;
          document.querySelector('.user-details p').textContent = userData['personal-data'].email;
      }
  }
});