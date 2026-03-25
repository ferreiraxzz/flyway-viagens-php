<?php
session_start();
include("../cadastro/conexao.php");

if (!isset($_SESSION['usuario'])) {
    header("Location: ../login/login.html");
    exit();
}

$nome = $_SESSION['usuario'];

$sql = "SELECT * FROM usuarios WHERE nome = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $nome);
$stmt->execute();
$result = $stmt->get_result();
$usuario = $result->fetch_assoc();

$foto = "/Vreal/assets/usuario_png.png"; 

if (!empty($usuario['foto'])) {
    $arquivo = basename($usuario['foto']);
    $caminho_fisico = __DIR__ . "/upload/" . $arquivo;
    if (file_exists($caminho_fisico)) {
        $foto = "/Vreal/perfil/upload/" . $arquivo;
    }
}
?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Meu Perfil - Flyway</title>
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
                <a href="/Vreal/login/logout.php" class="logout" style="color: #e03131 ">Sair</a>    
            </div>
        </nav>
    </header>
            <h1>Editar Perfil</h1>

    <main class="perfil-container">
        <form action="atualizar.php" method="post" enctype="multipart/form-data">
            <div class="foto">
                <label for="foto-perfil">
                    <?php
                    $foto = !empty($usuario['foto']) && file_exists($usuario['foto']) 
                            ? $usuario['foto'] : '/Vreal/assets/usuario_png.png';
                    ?>                      
                    <img src="<?= $foto ?>" alt="Foto de Perfil" class="foto-perfil">
                    <input type="file" name="foto" id="foto-perfil" accept="image/*">
                </label>
            </div>

            <div class="formulario">
                <label>Nome:</label>
                <input type="text" name="nome" value="<?php echo $usuario['nome']; ?>" required>

                <label>Email:</label>
                <input type="email" name="email" value="<?php echo $usuario['email']; ?>" required>

                <label>País:</label>
                <input type="text" name="pais" value="<?php echo $usuario['pais']; ?>" required>

                <label>Gênero:</label>
                <select name="genero" required>
                    <option value="Masculino" <?= $usuario['genero'] == 'Masculino' ? 'selected' : ''; ?>>Masculino</option>
                    <option value="Feminino" <?= $usuario['genero'] == 'Feminino' ? 'selected' : ''; ?>>Feminino</option>
                    <option value="Outro" <?= $usuario['genero'] == 'Outro' ? 'selected' : ''; ?>>Outro</option>
                </select>

                <label>Data de Nascimento:</label>
                <input type="date" name="data" value="<?php echo $usuario['data_nascimento']; ?>" required>

                <div class="botoes">
                    <button type="submit">Salvar alterações</button>
                    <button type="reset" class="cancelar">Cancelar</button>
                </div>
            </div>
        </form>
    </main>
</body>
</html>
