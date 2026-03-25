<?php
session_start();
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
            <a href="#home">Home</a>
            <a href="#destinos">Destinos</a>
            <a href="/Vreal/login/login.html">Login</a>
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
                            <a href="/Vreal/destinos/recife.html"><button>Comprar</button></a>
                        </div>
                    </div>
                    <div class="card">
                        <img src="/Vreal/index/assets/rio-main.jpg" alt="Rio de Janeiro - RJ">
                        <div>
                            <h1>Rio de Janeiro - RJ</h1>
                            <p>Descubra o encanto do Rio de Janeiro, com suas praias icônicas, o Cristo Redentor e uma vida noturna pulsante. 🏖️⛱️</p>
                            <a href="/Vreal/destinos/riodejaneiro.html"><button>Comprar</button></a>
                        </div>
                    </div>
                    <div class="card">
                        <img src="assets/sp-main.jpg" alt="São Paulo - SP">
                        <div>
                            <h1>São Paulo - SP</h1>
                            <p>A metrópole que nunca dorme! Descubra a energia pulsante de São Paulo com sua rica cena cultural, gastronomia de classe mundial e arquitetura impressionante. 🌆🍽️</p>
                            <a href="/Vreal/destinos/saopaulo.html"><button>Comprar</button></a>
                        </div>
                    </div>
                    <div class="card">
                        <img src="assets/salvador-main.jpg" alt="Salvador - BA">
                        <div>
                            <h1>Salvador - BA</h1>
                            <p>Sinta a alma da Bahia em Salvador! Passeie pelo Pelourinho, relaxe em praias de águas cristalinas e se encante com a música e culinária afro-brasileira. 🎶🌊</p>
                            <a href="/Vreal/destinos/salvador.html"><button>Comprar</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 Flyway. Todos os direitos reservados.</p>
    </footer>
    <script src="script.js"></script>
</body>
</html>
