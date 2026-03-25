<?php
session_start();
include("../cadastro/conexao.php");

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (!isset($_SESSION['usuario'])) {
    header("Location: ../login/login.html");
    exit();
}

$usuario = $_SESSION['usuario'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_pacote = $_POST['id_pacote'];
    $metodo_pagamento = $_POST['metodo_pagamento'];
    $nome_titular = $_POST['nome_titular'];
    $numero_cartao = $_POST['numero_cartao'];
    $cvv = $_POST['cvv'];
    $validade = $_POST['validade'];
    $parcelas = $_POST['parcelas'];
    $data_pagamento = date('Y-m-d H:i:s');

    // Inserir o pagamento
    $stmt = $conn->prepare("INSERT INTO pagamentos (id_pacote, metodo_pagamento, nome_titular, numero_cartao, cvv, validade, parcelas, data_pagamento) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("isssssis", $id_pacote, $metodo_pagamento, $nome_titular, $numero_cartao, $cvv, $validade, $parcelas, $data_pagamento);

    if ($stmt->execute()) {
        // Atualizar o status do pacote para "pago"
        $update = $conn->prepare("UPDATE pacotes SET status = 'pago' WHERE id = ?");
        $update->bind_param("i", $id_pacote);
        $update->execute();
        $update->close();

        // Redirecionar para a página de sucesso (Previne duplicação ao dar F5)
        header("Location: pagamento_sucesso.php");
        exit();
    } else {
        echo "Erro ao processar pagamento: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    header("Location: ../index/index.php");
    exit();
}
?>
