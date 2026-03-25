document.addEventListener("DOMContentLoaded", () => {
    const navbarLinks = document.querySelectorAll(".navbar a");

    navbarLinks.forEach(link => {
        link.addEventListener("click", event => {
            const sectionId = link.getAttribute("href");

            if (sectionId.startsWith("#")) {
                event.preventDefault();
                const targetSection = document.querySelector(sectionId);

                if (targetSection) {
                    targetSection.scrollIntoView({
                        behavior: "smooth",
                        block: "start"
                    });
                }
            }
        });
    });

    const form = document.querySelector(".reservation-form");
    const allowedDestinations = ["são paulo", "salvador", "rio de janeiro", "recife"];

    form.addEventListener("submit", event => {
        event.preventDefault(); 

        const dataIda = new Date(form.data_ida.value);
        const dataVolta = new Date(form.data_volta.value);
        const origem = form.origem.value.trim().toLowerCase(); 
        const destino = form.destino.value.trim().toLowerCase(); 
        const today = new Date();

        if (dataIda.getTime() === dataVolta.getTime() || dataIda < today) {
            alert("A data de ida não pode ser igual à data de volta ou ser menor que o dia atual.");
            return;
        }

        if (dataVolta < dataIda) {
            alert("A data de volta não pode ser antes da data de ida.");
            return;
        }

        if (origem === destino) {
            alert("A origem não pode ser igual ao destino.");
            return;
        }

        if (!allowedDestinations.includes(destino)) {
            alert(
                "O destino informado não é permitido. Os destinos disponíveis são: São Paulo, Salvador, Rio de Janeiro e Recife."
            );
            return;
        }

        alert("Formulário enviado com sucesso!");
        form.submit();
    });
});

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


