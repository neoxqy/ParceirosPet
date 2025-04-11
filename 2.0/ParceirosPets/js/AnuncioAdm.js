document.addEventListener('DOMContentLoaded', () => {
  const button = document.querySelector('.btn');
  button.classList.add('bounce');

  const imageInputs = document.querySelectorAll('.image-input');
  imageInputs.forEach(input => {
      input.addEventListener('change', (event) => {
          const file = event.target.files[0];
          if (file) {
              const reader = new FileReader();
              reader.onload = (e) => {
                  const preview = input.nextElementSibling; 
                  preview.innerHTML = ''; 
                  const img = document.createElement('img');
                  img.src = e.target.result;
                  preview.appendChild(img);
              };
              reader.readAsDataURL(file);
          }
      });
  });

  const placeholders = document.querySelectorAll('.image-placeholder');
  placeholders.forEach(placeholder => {
      placeholder.addEventListener('mouseover', () => {
          placeholder.style.transform = 'scale(1.05)';
          placeholder.style.transition = 'transform 0.3s ease';
      });
      placeholder.addEventListener('mouseout', () => {
          placeholder.style.transform = 'scale(1)';
      });
  });
});

const styleSheet = document.styleSheets[0];
styleSheet.insertRule(`
  .bounce {
      animation: bounce 1s ease;
  }
`, styleSheet.cssRules.length);