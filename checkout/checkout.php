<?php
session_start();
include("../cadastro/conexao.php");
include("../componentes/foto_perfil.php");

if (!isset($_SESSION['usuario'])) {
    header("Location: ../login/login.html");
    exit();
}

$usuario = $_SESSION['usuario'];
$id_pacote = isset($_GET['id']) ? intval($_GET['id']) : 0;

$sql = "SELECT * FROM pacotes WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_pacote);
$stmt->execute();
$pacote = $stmt->get_result()->fetch_assoc();

if (!$pacote) {
    echo "Pacote não encontrado.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Checkout - Flyway</title>
    <link rel="stylesheet" href="../pacotes/style.css">
    <link rel="stylesheet" href="/Vreal/header.css">
    <style>
        .form-section { display: none; margin-top: 20px; }
        .qrcode-codigo { background: #f2f2f2; padding: 10px; word-break: break-all; border-radius: 6px; }
        select, input { width: 100%; padding: 8px; margin-bottom: 10px; border-radius: 6px; border: 1px solid #ccc; }
        button { background-color: #692a91; color: white; padding: 10px 20px; border: none; border-radius: 6px; cursor: pointer; }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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

<main class="pacotes-container">
    <h1>Checkout - <?= htmlspecialchars($pacote['destino']) ?></h1>

    <form id="pagamento-form" action="checkout_process.php" method="post">
        <input type="hidden" name="id_pacote" value="<?= $id_pacote ?>">

        <label for="pagamento">Escolha o método de pagamento:</label>
        <select id="pagamento" name="metodo_pagamento" onchange="mostrarFormulario()" required>
            <option value="">Selecione...</option>
            <option value="debito">Cartão de Débito</option>
            <option value="credito">Cartão de Crédito</option>
            <option value="pix">Pix</option>
        </select>

        <!-- Formulário Cartão -->
        <div id="form-cartao" class="form-section">
            <input type="text" name="nome_titular" placeholder="Nome do Titular" required>
            <input type="text" name="numero_cartao" placeholder="Número do Cartão" maxlength="19" required>
            <input type="text" name="cvv" placeholder="CVV" maxlength="4" required>
            <input type="text" name="validade" placeholder="Validade (MM/AA)" maxlength="5" required>

            <div id="parcelamento" style="display:none;">
                <label for="parcelas">Parcelamento:</label>
                <select name="parcelas">
                    <option value="1x">1x sem juros</option>
                    <option value="2x">2x</option>
                    <option value="3x">3x</option>
                    <option value="4x">4x</option>
                    <option value="5x">5x</option>
                    <option value="6x">6x</option>
                </select>
            </div>
        </div>

        <!-- Formulário Pix -->
        <div id="form-pix" class="form-section">
            <p>Pix Copia e Cola (válido por 5 minutos):</p>
            <div class="qrcode-codigo" id="pix-codigo"></div>
        </div>

        <button type="submit">Confirmar Pagamento</button>
    </form>
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

function mostrarFormulario() {
    const metodo = document.getElementById('pagamento').value;
    const formCartao = document.getElementById('form-cartao');
    const formPix = document.getElementById('form-pix');
    const parcelamento = document.getElementById('parcelamento');

    formCartao.style.display = 'none';
    formPix.style.display = 'none';
    parcelamento.style.display = 'none';

    if (metodo === 'debito') {
        formCartao.style.display = 'block';
    } else if (metodo === 'credito') {
        formCartao.style.display = 'block';
        parcelamento.style.display = 'block';
    } else if (metodo === 'pix') {
        formPix.style.display = 'block';
        gerarPixCodigo();
    }
}

// Geração de Pix Copia e Cola aleatório (simulação)
function gerarPixCodigo() {
    const codigo = '00020126360014BR.GOV.BCB.PIX0114+558199999999520400005303986540510.005802BR5920Flyway Turismo Ltda6009SaoPaulo62070503***' + Math.floor(Math.random()*100000);
    document.getElementById('pix-codigo').innerText = codigo;
}

// Máscaras para número de cartão e validade
$(document).ready(function() {
    $('input[name="numero_cartao"]').on('input', function() {
        this.value = this.value.replace(/\D/g, '').replace(/(\d{4})(?=\d)/g, '$1 ').trim();
    });

    $('input[name="validade"]').on('input', function() {
        this.value = this.value.replace(/\D/g, '').replace(/(\d{2})(\d{1,2})/, '$1/$2').substr(0, 5);
    });

    $('input[name="cvv"]').on('input', function() {
        this.value = this.value.replace(/\D/g, '');
    });
});

// Validação de formulário antes de enviar
document.getElementById('pagamento-form').addEventListener('submit', function(e) {
    const metodo = document.getElementById('pagamento').value;
    if (!metodo) {
        alert('Escolha um método de pagamento.');
        e.preventDefault();
    }
});
</script>

</body>
</html>
