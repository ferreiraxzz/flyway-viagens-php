<?php
$servername = "localhost";
$username = "SEU_USUARIO";
$password = "SUA_SENHA";
$database = "flyway";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
?>