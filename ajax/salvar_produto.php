<?php
include("../config/conexao.php");

$nome = $_POST['nome'] ?? null;
$preco = $_POST['preco'] ?? null;
$fornecedor = $_POST['fornecedor'] ?? null;

if($nome && $preco && $fornecedor){
    $sql = "INSERT INTO produtos (nome, preco, fornecedor_id) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$nome, $preco, $fornecedor]);
}
?>