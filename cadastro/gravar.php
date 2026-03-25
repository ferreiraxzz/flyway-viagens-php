<?php
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);
include("conexao.php");

$mensagem = "";
$link_destino = "";
$link_texto = "";

$nome = $_POST['txt_usuario'] ?? '';
$email = $_POST['txt_email'] ?? '';
$pais = $_POST['pais'] ?? '';
$senha = password_hash($_POST['txt_senha'] ?? '', PASSWORD_DEFAULT);
$genero = $_POST['txt_genero'] ?? '';
$data = $_POST['txt_data'] ?? '';

// Verificar se o e-mail já existe
$check = $conn->prepare("SELECT id FROM usuarios WHERE email = ?");
$check->bind_param("s", $email);
$check->execute();
$check->store_result();

if ($check->num_rows > 0) {
    $mensagem = "E-mail já cadastrado.";
    $link_destino = "cadastro.html";
    $link_texto = "Voltar ao Cadastro";
} else {
    $sql = "INSERT INTO usuarios (nome, email, pais, senha, genero, data_nascimento) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $nome, $email, $pais, $senha, $genero, $data);

    if ($stmt->execute()) {
        $mensagem = "Cadastro realizado com sucesso!";
        $link_destino = "../login/login.html";
        $link_texto = "Ir para o Login";
    } else {
        $mensagem = "Erro ao cadastrar: " . $stmt->error;
        $link_destino = "cadastro.html";
        $link_texto = "Voltar ao Cadastro";
    }
    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastro - Flyway</title>
    <link rel="stylesheet" href="/Vreal/header.css">
    <style>
        body {
            background-color: #f5f5f5;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 100px auto;
            background-color: #fff;
            padding: 30px;
            text-align: center;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        h2 {
            color: #4CAF50;
        }
        p {
            font-size: 18px;
            color: #333;
        }
        a.btn-voltar {
            display: inline-block;
            margin-top: 20px;
            padding: 12px 24px;
            background-color: #4CAF50;
            color: #fff;
            text-decoration: none;
            border-radius: 6px;
            transition: background-color 0.3s ease;
        }
        a.btn-voltar:hover {
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
            <a href="/Vreal/login/logout.php" class="logout">Sair</a>
        </div>
    </nav>
</header>

<main>
    <div class="container">
        <h2><?= htmlspecialchars($mensagem) ?></h2>
        <?php if (!empty($link_destino) && !empty($link_texto)): ?>
            <a href="<?= htmlspecialchars($link_destino) ?>" class="btn-voltar"><?= htmlspecialchars($link_texto) ?></a>
        <?php endif; ?>
    </div>
</main>

</body>
</html>
