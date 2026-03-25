<?php
session_start();
include("../cadastro/conexao.php");

if (!isset($_SESSION['usuario'])) {
    header("Location: ../login/login.html");
    exit();
}

$nome_antigo = $_SESSION['usuario'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$pais = $_POST['pais'];
$genero = $_POST['genero'];
$data = $_POST['data'];

$foto = null;

if (isset($_FILES['foto']) && $_FILES['foto']['error'] === 0) {
    $extensao = strtolower(pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION));
    $nome_arquivo = uniqid() . "." . $extensao;
    $caminho = "upload/" . $nome_arquivo;

    if (move_uploaded_file($_FILES['foto']['tmp_name'], $caminho)) {
        $foto = $caminho;
    }
}

if ($foto) {
    $sql = "UPDATE usuarios SET nome=?, email=?, pais=?, genero=?, data_nascimento=?, foto=? WHERE nome=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssss", $nome, $email, $pais, $genero, $data, $foto, $nome_antigo);
} else {
    $sql = "UPDATE usuarios SET nome=?, email=?, pais=?, genero=?, data_nascimento=? WHERE nome=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $nome, $email, $pais, $genero, $data, $nome_antigo);
}

if ($stmt->execute()) {
    $_SESSION['usuario'] = $nome; 
    header("Location: perfil.php");
    exit();
} else {
    echo "Erro ao atualizar: " . $stmt->error;
}

$conn->close();
?>
