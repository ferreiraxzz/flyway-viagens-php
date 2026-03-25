function alterarQtd(id, delta) {
    const input = document.getElementById(id);
    let valor = parseInt(input.value);
    valor += delta;
    if (valor < 1) valor = 1;
    input.value = valor;
};

function toggleMenu() {
    const menu = document.getElementById("dropdown-menu");
    menu.style.display = (menu.style.display === "block") ? "none" : "block";
};

// Fecha o menu se clicar fora
window.addEventListener('click', function(e) {
    if (!e.target.matches('.user-icon')) {
        const menu = document.getElementById("dropdown-menu");
        if (menu) menu.style.display = "none";
    }
});

