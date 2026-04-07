<?php
include("../config/conexao.php");

$sql = "SELECT p.nome, p.preco, f.nome as fornecedor
        FROM produtos p
        JOIN fornecedores f ON p.fornecedor_id = f.id";

$stmt = $conn->query($sql);

echo "<table border='1'>";
echo "<tr><th>Nome</th><th>Preço</th><th>Fornecedor</th></tr>";

while($p = $stmt->fetch(PDO::FETCH_ASSOC)){
    echo "<tr>
            <td>{$p['nome']}</td>
            <td>R$ {$p['preco']}</td>
            <td>{$p['fornecedor']}</td>
          </tr>";
}

echo "</table";
?>