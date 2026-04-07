<?php
include("../config/conexao.php");

$sql = "SELECT p.nome, p.preco, f.nome AS fornecedor 
        FROM produtos p
        JOIN fornecedores f ON p.fornecedor_id = f.id";

$stmt = $conn->query($sql);

echo "<table class='table table-striped'>";
echo "<tr><th>Produto</th><th>Preço</th><th>Fornecedor</th></tr>";

while($p = $stmt->fetch(PDO::FETCH_ASSOC)){
    echo "<tr>
            <td>{$p['nome']}</td>
            <td>R$ {$p['preco']}</td>
            <td>{$p['fornecedor']}</td>
          </tr>";
}

echo "</table>";
?>