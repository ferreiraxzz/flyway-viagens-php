<?php
session_start();
include("../cadastro/conexao.php");

$foto = "/Vreal/assets/usuario_png.png"; // imagem padrão

if (isset($_SESSION['usuario'])) {
    $nome = $_SESSION['usuario'];
    $sql = "SELECT foto FROM usuarios WHERE nome = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $nome);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($usuario = $result->fetch_assoc()) {
        $arquivo = !empty($usuario['foto']) ? basename($usuario['foto']) : '';
        $caminho_fisico = __DIR__ . "/../perfil/upload/" . $arquivo;
        if (!empty($arquivo) && file_exists($caminho_fisico)) {
            $foto = "/Vreal/perfil/upload/" . $arquivo;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="imagex/png" href="/assets/flyway-guide-icon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flyway - Seu site de viagens</title>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="/Vreal/header.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Mukta:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="/Vreal/reviews.css">


</head>
<body>
    <?php if (isset($_SESSION['usuario']) && isset($_SESSION['boas_vindas'])): ?>
    <div id="popup-bemvindo" class="popup">
        <h1>Olá, <?php echo $_SESSION['usuario']; ?>!</h1>
        <p>Seja bem-vindo à Flyway!</p>
    </div>
    <?php unset($_SESSION['boas_vindas']); endif; ?>

    <header>
        <a href="/Vreal/index/index.php" class="logo">
            <img src="/Vreal/assets/flyway-icon.png" alt="Logo Flyway" class="logo-img">
            Flyway.com
        </a>
        <nav class="navbar">
            <div class="user-menu">
                <a href="#home">Home</a>
                <a href="#destinos">Destinos</a>
                <img src="<?= $foto ?>" alt="Foto de Perfil" class="user-icon" onclick="toggleMenu()">
                    <div id="dropdown-menu" class="dropdown">
                        <a href="/Vreal/perfil/perfil.php">Meu Perfil</a>
                        <a href="/Vreal/pacotes/meus_pacotes.php">Meus Pacotes</a>
                        <a href="/Vreal/login/logout.php" class="logout">Sair</a>
                    </div>
            </div>
         </nav>
         
    </header>
    <main>
        <section id="home" class="section-view">
            <div class="view">
                <div class="img-view">
                    <img src="/Vreal/index/assets/view.png" alt="Paisagem de Praia">
                </div>
                <div class="content-view">
                    <h1>Reserve sua viagem</h1>
                    <p>Encontre os melhores destinos com as melhores opções de preços e descontos!</p>
                    <div class="form-container">
                        <form action="#" class="reservation-form">
                            <input type="date" name="data_ida" placeholder="Data de Ida" required>
                            <input type="text" name="origem" placeholder="Origem" required>
                            <input type="text" name="destino" placeholder="Destino" required>
                            <input type="date" name="data_volta" placeholder="Data de Volta" required>
                            <button type="submit">Buscar</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <section id="destinos" class="section-destinos">
            <div class="destinos">
                <div class="content-destinos">
                    <h1>🔥Destinos mais procurados</h1>
                    <p>Nesta seção disponibilizamos os 4 destinos mais procurados aqui na Flyway</p>
                </div>
                <div class="cards-destinos">
                    <div class="card">
                        <img src="/Vreal/index/assets/recife-main.jpg" alt="Recife - PE">
                        <div>
                            <h1>Recife - PE</h1>
                            <p>Mergulhe na cultura vibrante de Recife, a "Veneza Brasileira". Explore suas praias paradisíacas, a rica história colonial e a culinária deliciosa. 🌴☀️</p>
                            <a href="/Vreal/destinos/recife.php"><button>Comprar</button></a>
                        </div>
                    </div>
                    <div class="card">
                        <img src="/Vreal/index/assets/rio-main.jpg" alt="Rio de Janeiro - RJ">
                        <div>
                            <h1>Rio de Janeiro - RJ</h1>
                            <p>Descubra o encanto do Rio de Janeiro, com suas praias icônicas, o Cristo Redentor e uma vida noturna pulsante. 🏖️⛱️</p>
                            <a href="/Vreal/destinos/riodejaneiro.php"><button>Comprar</button></a>
                        </div>
                    </div>
                    <div class="card">
                        <img src="assets/sp-main.jpg" alt="São Paulo - SP">
                        <div>
                            <h1>São Paulo - SP</h1>
                            <p>A metrópole que nunca dorme! Descubra a energia pulsante de São Paulo com sua rica cena cultural, gastronomia de classe mundial e arquitetura impressionante. 🌆🍽️</p>
                            <a href="/Vreal/destinos/saopaulo.php"><button>Comprar</button></a>
                        </div>
                    </div>
                    <div class="card">
                        <img src="assets/salvador-main.jpg" alt="Salvador - BA">
                        <div>
                            <h1>Salvador - BA</h1>
                            <p>Sinta a alma da Bahia em Salvador! Passeie pelo Pelourinho, relaxe em praias de águas cristalinas e se encante com a música e culinária afro-brasileira. 🎶🌊</p>
                            <a href="/Vreal/destinos/salvador.php"><button>Comprar</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="cards" id="cards">
        <div class="container">
            <div class="section_header">
            <h2 class="title">O que nossos viajantes dizem!</h2>
            </div>
            <div class="swiper-slider swiper">
            <div class="swiper-wrapper">

                <div class="swiper-slide item">
                <div class="info">
                    <img src="/Vreal/assets/memphis_profile.jpeg" alt="Profile image">
                    <div class="textbox">
                    <h3 class="name">Memphis Depay </h3>
                    <span class="job">Turista de São Paulo</span>
                    </div>
                </div>
                <p>Minha viagem para Recife foi simplesmente incrível! O suporte da equipe foi excelente e cada detalhe do roteiro superou minhas expectativas.</p>
                <div class="rating">⭐⭐⭐⭐⭐</div>
                </div>

                <div class="swiper-slide item">
                <div class="info">
                    <img src="/Vreal/assets/carillo_profile.jpg" alt="Profile image">
                    <div class="textbox">
                    <h3 class="name">André Carillo</h3>
                    <span class="job">Viajante do Peru</span>
                    </div>
                </div>
                <p>Fiz um pacote para o Rio de Janeiro e fiquei impressionado com a organização. Todos os passeios foram pontuais e com guias muito bem preparados!</p>
                <div class="rating">⭐⭐⭐⭐⭐</div>
                </div>

                <div class="swiper-slide item">
                <div class="info">
                    <img src="/Vreal/assets/garro_profile.jpg" alt="Profile image">
                    <div class="textbox">
                    <h3 class="name">Rodrigo Garro</h3>
                    <span class="job">Viajante da Argentina</span>
                    </div>
                </div>
                <p>Viajei com minha família para Salvador e foi tudo perfeito! Hotéis ótimos, transporte confortável e atendimento super atencioso. Recomendo muito a agência!</p>
                <div class="rating">⭐⭐⭐⭐⭐</div>
                </div>

                <div class="swiper-slide item">
                <div class="info">
                    <img src="/Vreal/assets/hugo_profile.jpg" alt="Profile image">
                    <div class="textbox">
                    <h3 class="name">Hugo Souza</h3>
                    <span class="job">Explorador do Rio de Janeiro</span>
                    </div>
                </div>
                <p>Fechei uma viagem para São Paulo com eles e foi uma das melhores experiências da minha vida. Roteiro personalizado e todo o suporte durante a viagem. Nota 10!</p>
                <div class="rating">⭐⭐⭐⭐⭐</div>
                </div>

                <div class="swiper-slide item">
                <div class="info">
                    <img src="/Vreal/assets/raniele_profile.jpeg" alt="Profile image">
                    <div class="textbox">
                    <h3 class="name">Raniele Melo</h3>
                    <span class="job">Viajante de Cuiabá</span>
                    </div>
                </div>
                <p>Contratei o pacote para Recife e foi maravilhoso! Desde o momento da reserva até o retorno, tudo correu de forma impecável. Já estou planejando a próxima!</p>
                <div class="rating">⭐⭐⭐⭐⭐</div>
                </div>

                <div class="swiper-slide item">
                <div class="info">
                    <img src="/Vreal/assets/andre_profile.jpg" alt="Profile image">
                    <div class="textbox">
                    <h3 class="name">André Ramalho</h3>
                    <span class="job">Aventureiro de Porto Alegre</span>
                    </div>
                </div>
                <p>Fiz uma viagem de pelo nordeste com o suporte deles e foi incrível! Preços justos, ótimas dicas e suporte 24h durante a viagem. Sensacional!</p>
                <div class="rating">⭐⭐⭐⭐⭐</div>
                </div>

            </div>
            <div class="swiper-pagination cards-pagination"></div>
            </div>
        </div>
    </section>

    </main>

    <footer>
        <p>&copy; 2024 Flyway. Todos os direitos reservados.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script>
        const swiper = new Swiper('.swiper-slider', {
            slidesPerView: 1,
            spaceBetween: 30,
            grabCursor: true,
            loop: true,
            autoplay: {
            delay: 5000,
            disableOnInteraction: false,
            },
            effect: 'slide', // Você pode trocar para 'fade' se quiser
            speed: 800,
            pagination: {
            el: '.cards-pagination',
            clickable: true
            },
            breakpoints: {
            768: {
                slidesPerView: 2,
            },
            1024: {
                slidesPerView: 3,
            }
            }
        });
    </script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>AOS.init();</script>
    <script src="script.js"></script>
</body>
</html>
