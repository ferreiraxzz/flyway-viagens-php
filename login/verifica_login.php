<?php
session_start();
include("../cadastro/conexao.php");

$email = $_POST['email'];
$senha = $_POST['senha'];

$sql = "SELECT * FROM usuarios WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($usuario = $result->fetch_assoc()) {
    if (password_verify($senha, $usuario['senha'])) {
        $_SESSION['usuario'] = $usuario['nome'];

        $_SESSION['boas_vindas'] = true;

        header("Location: /Vreal/index/index.php");
        exit();
    } else {
        echo "<script>alert('Senha incorreta'); history.back();</script>";
    }
} else {
    echo "<script>alert('Usuário não encontrado'); history.back();</script>";
}
?>
