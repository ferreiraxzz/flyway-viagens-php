<?php include("../componentes/foto_perfil.php"); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" href="/Vreal/destinos/pag_destino.css">
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="imagex/png" href="/Vreal/assets/flyway-guide-icon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flyway - Viagens para Rio de Janeiro</title>
</head>
<body>
    <header>
        <a href="/Vreal/index/index.php" class="logo">
            <img src="/Vreal/assets/flyway-icon.png" alt="Logo Flyway" class="logo-img">
            Flyway.com
        </a>
        <nav class="navbar">
            <div class="user-menu">
                <a href="/Vreal/index/index.php">Home</a>
                <a href="/Vreal/index/index.php">Destinos</a>
                <img src="<?= $foto ?>" alt="Foto de Perfil" class="user-icon" onclick="toggleMenu()">
                    <div id="dropdown-menu" class="dropdown">
                        <a href="/Vreal/perfil/perfil.php">Meu Perfil</a>
                        <a href="/Vreal/pacotes/meus_pacotes.php">Meus Pacotes</a>
                        <a href="/Vreal/login/logout.php" class="logout">Sair</a>
                    </div>
            </div>
        </nav>
    </header> 
    
    <section>

        <div id="background_outdoor">
            <img src="/Vreal/destinos/assets/hotel_rio.jpg" alt="">
        </div>

    <div id="app">
        <div class="outdoor_info">

            <h2>Solare Brisa All Inclusive Resort</h2>
            <p style="font-size: 20px;"> 
                Resort, cercado por paisagens exuberantes, oferece uma estadia inesquecível para quem busca conforto e diversão em um ambiente tropical.
            </p>
            <img src="/Vreal/destinos/assets/estrela.png" alt="">
            <img src="/Vreal/destinos/assets/estrela.png" alt="">
            <img src="/Vreal/destinos/assets/estrela.png" alt="">
            <img src="/Vreal/destinos/assets/estrela.png" alt="">
            <img src="/Vreal/destinos/assets/avaliacao.png" alt="">
        </div>

        <div class="outdoor_button">
            <button type="submit" onclick="abrirGaleria()">Ver mais</button>
        </div>
    </div>

    </section>

    <section id="informations" style="height: 640px;">
        <div class="informations_hotel">
            <h2>O que o resort oferece?</h2>
            <p>
                O <strong>Solare Brisa All Inclusive Resort</strong> é um refúgio paradisíaco localizado no deslumbrante litoral do Rio de Janeiro, Brasil. Com vistas deslumbrantes do oceano e rodeado por uma natureza exuberante, o resort oferece uma combinação perfeita de conforto, elegância e descontração à beira-mar.

                O Solare Brisa possui <strong>180 suítes sofisticadas</strong>, todas com design inspirado na serenidade do mar e no frescor das brisas tropicais. Cada suíte conta com varandas privativas que dão vista para o mar ou para os exuberantes jardins do resort. As acomodações são equipadas com camas king-size, banheiras de imersão e uma decoração moderna com toques artesanais que trazem a essência da cultura local.

                Para os aventureiros, o Solare Brisa organiza <strong>passeios de barco, trilhas ecológicas e aulas de ioga ao amanhecer nas dunas</strong>. Já as famílias podem desfrutar de um clube infantil com atividades supervisionadas e uma piscina exclusiva para crianças.
            </p>
        </div>

        <div class="price_map">

            <div class="price_contain">

                    <div class="prices">
                    <p style="font-size: 15px;">Por pessoa</p>
                        <span class="price">R$ 1.200</span>
                        <p>Em até 8x sem juros</p>         
                        <p style="font-size: 15px;">8x de R$150,00</p>
                    </div>

                    <div class="prices_2">
                        <form action="/Vreal/destinos/gravar_pacote.php" method="post">
                            <input type="hidden" name="destino" value="Rio de Janeiro">

                            <label>Quartos:</label>
                            <div class="counter">
                                <button type="button" onclick="alterarQtd('quartos', -1)">-</button>
                                <input type="number" name="quartos" id="quartos" value="1" min="1" readonly>
                                <button type="button" onclick="alterarQtd('quartos', 1)">+</button>
                            </div>

                            <label>Pessoas:</label>
                            <div class="counter">
                                <button type="button" onclick="alterarQtd('pessoas', -1)">-</button>
                                <input type="number" name="pessoas" id="pessoas" value="1" min="1" readonly>
                                <button type="button" onclick="alterarQtd('pessoas', 1)">+</button>
                            </div>

                            <button type="submit" >Reservar</button>
                        </form> 
                    </div>                        
            </div>

            <div class="location">
                <img src="/Vreal/destinos/assets/mapa.jpg" alt="">
                <div class="location_info">
                    <h2>Av. Tom Jobim, 80</h2>
                    <p>Pelourinho</p>
                    <p>Rio de janeiro - RJ</p>
                </div>
                <div class="location_button">
                    <a href="https://www.google.com/maps/place/Rio+de+Janeiro,+RJ/@-22.9137892,-43.7763437,10z/data=!3m1!4b1!4m6!3m5!1s0x9bde559108a05b:0x50dc426c672fd24e!8m2!3d-22.9068467!4d-43.1728965!16zL20vMDZnbXI?entry=ttu&g_ep=EgoyMDI0MTExOS4yIKXMDSoASAFQAw%3D%3D"><button>Ver no mapa</button></a>
                </div>
            </div>
        </div>

    </section>

    <div id="galeriaOverlay" class="galeria-overlay">
        <span class="fechar" onclick="fecharGaleria()">×</span>
        <div class="galeria-conteudo">
            <button class="seta esquerda" onclick="mudarImagem(-1)">❮</button>
            <img id="imagemAtual" class="imagem-galeria" src="/Vreal/destinos/assets/hotel_rio.jpg" alt="Foto do hotel">
            <button class="seta direita" onclick="mudarImagem(1)">❯</button>
        </div>
        <div class="galeria-thumbnails" id="galeriaThumbs">
        </div>
    </div>

        <script>
            const imagens = [
            "/Vreal/destinos/assets/hotel_rio.jpg",
            "/Vreal/destinos/assets/hotel_rio2.jpg",
            "/Vreal/destinos/assets/hotel_rio3.jpg",
            "/Vreal/destinos/assets/hotel_rio4.jpg",
        ];
        let indiceAtual = 0;

        function abrirGaleria() {
            document.getElementById("galeriaOverlay").style.display = "flex";
            document.body.classList.add("no-scroll"); 
            atualizarImagem();
            gerarMiniaturas();
        }

        function fecharGaleria() {
            document.getElementById("galeriaOverlay").style.display = "none";
            document.body.classList.remove("no-scroll");
        }


        function mudarImagem(direcao) {
            indiceAtual = (indiceAtual + direcao + imagens.length) % imagens.length;
            atualizarImagem();
        }

        function atualizarImagem() {
            const imagem = document.getElementById("imagemAtual");
            imagem.src = imagens[indiceAtual];
            document.querySelectorAll(".galeria-thumbnails img").forEach((el, idx) => {
                el.classList.toggle("selecionada", idx === indiceAtual);
            });
        }

        function gerarMiniaturas() {
            const container = document.getElementById("galeriaThumbs");
            container.innerHTML = "";
            imagens.forEach((src, index) => {
                const img = document.createElement("img");
                img.src = src;
                img.onclick = () => { indiceAtual = index; atualizarImagem(); };
                if (index === indiceAtual) img.classList.add("selecionada");
                container.appendChild(img);
            });
        }
        
        </script>
    <script src="/Vreal/destinos/script.js"></script>
</body>
</html>