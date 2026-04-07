<?php
session_start();
include("../config/conexao.php");

// se não existir, cria
if (!isset($_SESSION['cesta'])) {
    $_SESSION['cesta'] = [];
}

foreach($_POST['produtos'] as $id){
    $stmt = $conn->prepare("SELECT * FROM produtos WHERE id = ?");
    $stmt->execute([$id]);
    $produto = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($produto) {
        $_SESSION['cesta'][] = $produto;
    }
}

echo "ok";
?>