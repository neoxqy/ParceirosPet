const paymentOptions = document.querySelectorAll('.pagamento-option');
const confirmButton = document.getElementById('confirmar-pagamento');
let selectedPayment = null; // armazena a escolha do pagamento


paymentOptions.forEach(option => {
    option.addEventListener('click', () => {
        
        paymentOptions.forEach(o => o.classList.remove('selected'));

        option.classList.add('selected');

        selectedPayment = option.getAttribute('data-value');
    });
});

// Adicionando evento de clique no botão Confirmar
confirmButton.addEventListener('click', () => {
    if (selectedPayment) {
        
        if (selectedPayment === 'pix') {
            window.location.href = 'pix.html'; // Página de pagamento Pix
        } else if (selectedPayment === 'credito') {
            window.location.href = 'credito.html'; // Página de pagamento Crédito
        } else if (selectedPayment === 'debito') {
            window.location.href = 'debito.html'; // Página de pagamento Débito
        }
    } else {
        alert('Por favor, selecione uma forma de pagamento antes de confirmar.');
    }
});
