<?php
session_start();
include("../cadastro/conexao.php");

// Gerar um código Pix Copia e Cola aleatório (fake, apenas para simulação)
$id_pacote = isset($_GET['id']) ? intval($_GET['id']) : 0;
$data = date('YmdHis');
$randomNumber = rand(100000, 999999);

// Exemplo de chave Pix fictícia
$copiaCola = "pix-{$id_pacote}-{$randomNumber}-{$data}";

// Retornar como texto puro
header('Content-Type: text/plain');
echo $copiaCola;
?>
