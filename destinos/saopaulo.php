<?php include("../componentes/foto_perfil.php"); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" href="/Vreal/destinos/pag_destino.css">
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="imagex/png" href="/Vreal/assets/flyway-guide-icon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flyway - Viagens para São Paulo</title>
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
            <img src="/Vreal/destinos/assets/hotel_sp.jpg" alt="">
        </div>

    <div id="app">
        <div class="outdoor_info">

            <h2>Nocchio All Inclusive Hotel  </h2>
            <p style="font-size: 20px;"> 
                Esse resort de luxo oferece uma experiência única, combinando conforto, diversão e um toque de natureza exuberante.
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
        <div class="informations_hotel">
            <h2>O que o resort oferece?</h2>
            <p>
                O <strong>Nocchio All Inclusive Hotel</strong>, situado na Avenida Dr. Mariano, 23, no Jabaquara, é um refúgio luxuoso que combina sofisticação e entretenimento. Esse resort, cercado por paisagens exuberantes, oferece uma estadia inesquecível para quem busca conforto e diversão em um ambiente tropical.

                O hotel conta com <strong>250 quartos e suítes elegantemente decorados</strong>, com um design contemporâneo e toques rústicos que harmonizam com a natureza ao redor. Todas as acomodações possuem varandas com vistas panorâmicas do mar ou dos jardins exuberantes, além de banheiras de hidromassagem e serviço de quarto 24 horas.

                O Nocchio é conhecido por sua gastronomia de excelência, com <strong>seis restaurantes exclusivos</strong>. Os hóspedes podem saborear desde pratos gourmet de alta gastronomia internacional até opções regionais autênticas, com ingredientes frescos e orgânicos colhidos na própria horta do resort. Além disso, há <strong>bares espalhados por todo o hotel</strong>, oferecendo drinks exóticos e coquetéis artesanais.
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
                            <input type="hidden" name="destino" value="São Paulo">

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
                        <h2>Av. Dr. Mariano, 23</h2>
                        <p>Jabaquara</p>
                        <p>São Paulo - SP</p>
                    </div>
                    <div class="location_button">
                        <a href="https://www.google.com/maps/place/São+Paulo,+SP/@-23.6820621,-46.9256603,10z/data=!3m1!4b1!4m6!3m5!1s0x94ce448183a461d1:0x9ba94b08ff335bae!8m2!3d-23.5557714!4d-46.6395571!16zL20vMDIycGZt?entry=ttu&g_ep=EgoyMDI0MTExOS4yIKXMDSoASAFQAw%3D%3D"><button>Ver no mapa</button></a>
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
            "/Vreal/destinos/assets/hotel_sp.jpg",
            "/Vreal/destinos/assets/hotel_sp2.jpg",
            "/Vreal/destinos/assets/hotel_sp3.jpg",
            "/Vreal/destinos/assets/hotel_sp4.jpg",
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