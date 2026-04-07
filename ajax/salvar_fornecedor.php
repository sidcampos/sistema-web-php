<?php
include("../config/conexao.php");

$sql = "INSERT INTO fornecedores (nome, cnpj) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->execute([$_POST['nome'], $_POST['cnpj']]);
?>