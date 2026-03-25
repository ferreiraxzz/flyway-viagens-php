<?php
session_start();
include("../componentes/foto_perfil.php");

if (!isset($_SESSION['usuario'])) {
    header("Location: ../login/login.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Pagamento Realizado - Flyway</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="/Vreal/header.css">
    <style>
        .success-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 30px;
            background-color: #e6f4ea;
            border: 2px solid #4CAF50;
            border-radius: 10px;
            text-align: center;
        }

        .success-container h2 {
            color: #2e7d32;
        }

        .success-container a {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .success-container a:hover {
            background-color: #45a049;
        }
    </style>
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

    <main>
        <div class="success-container">
            <h2>Pagamento realizado com sucesso!</h2>
            <p>Obrigado por escolher a Flyway.</p>
            <a href="/Vreal/pacotes/meus_pacotes.php">Ver Meus Pacotes</a>
        </div>
    </main>

    <script>
        function toggleMenu() {
            const menu = document.getElementById("dropdown-menu");
            menu.style.display = (menu.style.display === "block") ? "none" : "block";
        }

        window.addEventListener('click', function(e) {
            if (!e.target.matches('.user-icon')) {
                const menu = document.getElementById("dropdown-menu");
                if (menu) menu.style.display = "none";
            }
        });
    </script>
</body>
</html>
