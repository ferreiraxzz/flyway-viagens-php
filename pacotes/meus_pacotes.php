<?php
session_start();
include("../cadastro/conexao.php");
include("../componentes/foto_perfil.php");

if (!isset($_SESSION['usuario'])) {
    header("Location: ../login/login.html");
    exit();
}

$usuario = $_SESSION['usuario'];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cancelar_id'])) {
    $id = $_POST['cancelar_id'];
    $sql = "UPDATE pacotes SET status = 'cancelado' WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    header("Location: meus_pacotes.php");
    exit();
}

$sql = "SELECT * FROM usuarios WHERE nome = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $usuario);
$stmt->execute();
$user_data = $stmt->get_result()->fetch_assoc();
$email = $user_data['email'];

$sql = "SELECT * FROM pacotes WHERE email = ? ORDER BY data_reserva DESC";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

$aguardando = [];
$pago = [];
$cancelado = [];

while ($pac = $result->fetch_assoc()) {
    switch ($pac['status']) {
        case 'pago':
            $pago[] = $pac;
            break;
        case 'cancelado':
            $cancelado[] = $pac;
            break;
        default:
            $aguardando[] = $pac;
            break;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Meus Pacotes - Flyway</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="/Vreal/header.css">
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
        <h1>Meus Pacotes Reservados</h1>

        <?php if (!empty($aguardando)): ?>
            <h2 style="color:#692a91;">Aguardando Pagamento</h2>
            <div class="pacotes-lista">
                <?php foreach ($aguardando as $pac): ?>
                <div class="pacote-card">
                    <h2><?= htmlspecialchars($pac['destino']) ?></h2>
                    <p><strong>Quartos:</strong> <?= $pac['quartos'] ?></p>
                    <p><strong>Pessoas:</strong> <?= $pac['pessoas'] ?></p>
                    <p><strong>Data da Reserva:</strong> <?= date('d/m/Y H:i', strtotime($pac['data_reserva'])) ?></p>
                    <div class="botoes">
                        <a href="/Vreal/checkout/checkout.php?id=<?= $pac['id'] ?>" class="btn-pagar">Pagar</a>
                        <form method="post" style="display:inline;">
                            <input type="hidden" name="cancelar_id" value="<?= $pac['id'] ?>">
                            <button type="submit" class="btn-cancelar">Cancelar</button>
                        </form>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($pago)): ?>
            <h2 style="color:#692a91;">Pagos</h2>
            <div class="pacotes-lista">
                <?php foreach ($pago as $pac): ?>
                <div class="pacote-card" style="background-color:#e6f4ea; border: 1px solid #2f9e44;">
                    <h2><?= htmlspecialchars($pac['destino']) ?></h2>
                    <p><strong>Quartos:</strong> <?= $pac['quartos'] ?></p>
                    <p><strong>Pessoas:</strong> <?= $pac['pessoas'] ?></p>
                    <p><strong>Data da Reserva:</strong> <?= date('d/m/Y H:i', strtotime($pac['data_reserva'])) ?></p>
                </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($cancelado)): ?>
            <h2 style="color:#692a91;">Cancelados</h2>
            <div class="pacotes-lista">
                <?php foreach ($cancelado as $pac): ?>
                <div class="pacote-card" style="background-color:#fbecec;border: 1px solid #e03131;">
                    <h2><?= htmlspecialchars($pac['destino']) ?></h2>
                    <p><strong>Quartos:</strong> <?= $pac['quartos'] ?></p>
                    <p><strong>Pessoas:</strong> <?= $pac['pessoas'] ?></p>
                    <p><strong>Data da Reserva:</strong> <?= date('d/m/Y H:i', strtotime($pac['data_reserva'])) ?></p>
                </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <?php if (empty($aguardando) && empty($pago) && empty($cancelado)): ?>
            <p class="nenhum">Você ainda não reservou nenhum pacote.</p>
        <?php endif; ?>
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
