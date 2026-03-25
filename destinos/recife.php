<?php include("../componentes/foto_perfil.php"); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/Vreal/destinos/pag_destino.css">
    <link rel="shortcut icon" type="imagex/png" href="/Vreal/assets/flyway-guide-icon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flyway - Viagens para Recife</title>
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
            <img src="/Vreal/destinos/assets/hotel_recife.jpg" alt="">
        </div>

    <div id="app">
        <div class="outdoor_info">

            <h2>Big Resort All Inclusive</h2>
            <p style="font-size: 20px;"> 
                Refúgio paradisíaco localizado no deslumbrante litoral com vistas deslumbrantes do oceano e rodeado por uma natureza exuberante.
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

    <section id="informations">
        <div class="informations_hotel">
            <h2>O que o resort oferece?</h2>
            <p> 
                O <strong>Big Resort All Inclusive</strong>, localizado na <strong> Rua Maracujá, 54, no Jardim das Frutas,</strong> é um verdadeiro oásis tropical que promete uma experiência inesquecível. Com 300 suítes espaçosas e varandas privativas, os hóspedes podem desfrutar de vistas deslumbrantes dos jardins e da <strong>piscina cristalina</strong>. A gastronomia é um dos destaques, com cinco restaurantes temáticos que variam da culinária brasileira a frutos do mar e pratos asiáticos, além de um bar de smoothies à beira da piscina.

                Para diversão, o resort oferece um parque aquático moderno, aulas de dança, esportes aquáticos e um clube infantil supervisionado, garantindo que todos tenham uma ótima estadia. O spa, com tratamentos relaxantes e uma área de fitness bem equipada, é o lugar ideal para quem busca um momento de tranquilidade.
                
                Com um forte compromisso com a sustentabilidade, o Big Resort utiliza <strong>energia solar e promove práticas ecológicas</strong>, como a coleta de água da chuva. O local também é perfeito para eventos e casamentos, com espaços elegantes e pacotes personalizados. Seja para uma escapada romântica, férias em família ou uma celebração especial, o Big Resort All Inclusive oferece um <strong>refúgio de conforto e natureza em meio à beleza do Brasil</strong>.
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
                            <input type="hidden" name="destino" value="Recife">

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
                    <h2>Rua Maracujá, 54</h2>
                    <p>Jardim das Frutas</p>
                    <p>Recife - PE</p>
                </div>
                <div class="location_button">
                    <a href="https://www.google.com/maps/place/Recife,+PE/@-8.0432782,-35.0993781,11z/data=!3m1!4b1!4m6!3m5!1s0x7ab196f94e5408b:0xe5800ef782bde3a6!8m2!3d-8.0578381!4d-34.8828969!16s%2Fg%2F1pxyctxrg?entry=ttu&g_ep=EgoyMDI0MTExOS4yIKXMDSoASAFQAw%3D%3D"><button>Ver no mapa</button></a>
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
            "/Vreal/destinos/assets/hotel_recife.jpg",
            "/Vreal/destinos/assets/hotel_recife2.jpg",
            "/Vreal/destinos/assets/hotel_recife3.jpg",
            "/Vreal/destinos/assets/hotel_recife4.jpg",
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