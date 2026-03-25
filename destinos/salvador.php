<?php include("../componentes/foto_perfil.php"); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" href="/Vreal/destinos/pag_destino.css">
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="imagex/png" href="/Vreal/assets/flyway-guide-icon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flyway - Viagens para Salvador</title>
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
            <img src="/Vreal/destinos/assets/hotel_salvador.jpg" alt="">
        </div>

    <div id="app">
        <div class="outdoor_info">

            <h2>Lusso Verde All Inclusive Resort</h2>
            <p style="font-size: 20px;"> 
                Resort que combina luxo, sustentabilidade e uma imersão na natureza exuberante. Cercado por vegetação tropical, o hotel com uma experiência única de descanso em um ambiente eco-friendly.
            </p>
            <img src="/Vreal/destinos/assets/estrela.png" alt="">
            <img src="/Vreal/destinos/assets/estrela.png" alt="">
            <img src="/Vreal/destinos/assets/estrela.png" alt="">
            <img src="/Vreal/destinos/assets/estrela.png" alt="">
            <img src="/Vreal/destinos/assets/estrela.png" alt="">
        </div>

        <div class="outdoor_button">
            <button type="submit" onclick="abrirGaleria()">Ver mais</button>
        </div>
    </div>

    </section>

    <section id="informations" style="height: 640px;">
        <div class="informations_hotel" style="margin-top: 20px;">
            <h2>O que o resort oferece?</h2>
            <p>
                O <strong>Lusso Verde All Inclusive Resort</strong>, localizado em uma área privilegiada do Jardim das Frutas, Brasil, é um resort que combina luxo, sustentabilidade e uma imersão na natureza exuberante. Cercado por vegetação tropical, o hotel oferece uma experiência única de descanso e requinte em um <strong>ambiente eco-friendly</strong>   .

            
                Com 200 suítes de design contemporâneo, o Lusso Verde oferece acomodações que integram a sofisticação ao conforto. Todas as suítes possuem amplas janelas de vidro, proporcionando vistas panorâmicas para os <strong>jardins, lagos ou para o mar</strong>. Os quartos são equipados com banheiras de hidromassagem privativas e terraços com redes de descanso, permitindo aos hóspedes relaxar completamente.
            
           
                A gastronomia é um dos grandes destaques do resort. São <strong>cinco restaurantes gourmet</strong> que vão desde a alta cozinha italiana até pratos veganos preparados com ingredientes orgânicos cultivados na horta local. O bar à beira da piscina, inspirado em lounges europeus, oferece <strong>coquetéis exclusivos e vinhos importados</strong>, criando um ambiente sofisticado e descontraído.
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
                            <input type="hidden" name="destino" value="Salvador">

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
                    <h2>Rua Pergoraro, 71</h2>
                    <p>Vila Alexandre</p>
                    <p>Salvador - BA</p>
                </div>
                <div class="location_button">
                    <a href="https://www.google.com/maps/place/Salvador,+BA/@-12.9017132,-38.5853517,11z/data=!3m1!4b1!4m6!3m5!1s0x716112050422ebd:0xf71c84369573db9d!8m2!3d-12.9777378!4d-38.5016363!16s%2Fg%2F1ymsvkdl1?entry=ttu&g_ep=EgoyMDI0MTExOS4yIKXMDSoASAFQAw%3D%3D"><button>Ver no mapa</button></a>
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
            "/Vreal/destinos/assets/hotel_salvador.jpg",
            "/Vreal/destinos/assets/hotel_salvador2.jpg",
            "/Vreal/destinos/assets/hotel_salvador3.jpg",
            "/Vreal/destinos/assets/hotel_salvador4.jpg",
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