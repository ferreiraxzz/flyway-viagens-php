<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include_once("../cadastro/conexao.php");

$foto = "/Vreal/assets/usuario_png.png"; // imagem padrão

if (isset($_SESSION['usuario'])) {
    $nome = $_SESSION['usuario'];
    $sql = "SELECT foto FROM usuarios WHERE nome = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $nome);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($usuario = $result->fetch_assoc()) {
        $arquivo = basename($usuario['foto']);
        $caminho = realpath(__DIR__ . "/../perfil/upload/" . $arquivo);
        if (!empty($arquivo) && file_exists($caminho)) {
            $foto = "/Vreal/perfil/upload/" . $arquivo;
        }
    }
}
