<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();
include("../cadastro/conexao.php");

if (!isset($_SESSION['usuario'])) {
    echo "Você precisa estar logado para reservar.";
    exit();
}

$nome = $_SESSION['usuario'];

$sql = "SELECT * FROM usuarios WHERE nome = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $nome);
$stmt->execute();
$result = $stmt->get_result();
$cliente = $result->fetch_assoc();

if (!$cliente) {
    echo "Usuário não encontrado.";
    exit();
}

$destino = $_POST['destino'];
$quartos = $_POST['quartos'];
$pessoas = $_POST['pessoas'];

$sql = "INSERT INTO pacotes (destino, quartos, pessoas, nome, pais, email)
        VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("siisss", $destino, $quartos, $pessoas, $cliente['nome'], $cliente['pais'], $cliente['email']);


if ($stmt->execute()) {
    echo "<script>alert('Pacote reservado com sucesso!'); window.location.href = '/Vreal/index/index.php';</script>";
} else {
    echo "Erro ao reservar: " . $stmt->error;
}
?>
