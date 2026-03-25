document.addEventListener('DOMContentLoaded', () => {
    const form = document.querySelector('form');

    form.addEventListener('submit', (event) => {
        event.preventDefault(); 

        const emailInput = form.querySelector('input[type="email"]');
        const passwordInput = form.querySelector('input[type="password"]');

        const email = emailInput.value.trim();
        const password = passwordInput.value.trim();

        if (email === 'fatec@fatec.com' && password === 'fatec@123') {
            alert('Login efetuado com sucesso!');
            window.location.href = '/Vreal/index/index.html'; 
        } else {
            alert('E-mail ou senha inválidos. Tente novamente.');
        }
    });
});